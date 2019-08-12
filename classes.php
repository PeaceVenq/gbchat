<?php 

class user{

	private $UserId,$UserName,$UserMail,$UserPassword;

	public function setUserId($UserId)
	{
		$this->UserId=$UserId;
	}

	public function getUserId()
	{
		return $this->UserId;
		
		}
		

	



	public function setUserName($UserName)
	{
		$this->UserName=$UserName;
	}

	public function getUserName()
	{
		return $this->UserName;
	}



	public function setUserMail($UserMail)
	{
		$this->UserMail=$UserMail;
	}

	public function getUserMail()
	{
		return $this->UserMail;
	}



	public function setUserPassword($UserPassword)
	{
		$this->UserPassword=$UserPassword;
	}

	public function getUserPassword()
	{
		return $this->UserPassword;
	}


	public function InsertUser(){
		include "conn.php";

		$req=$bdd->prepare("INSERT into users(UserName,UserMail,UserPassword) values(:UserName,:UserMail,:UserPassword)");
		$req->execute(array(
		
			'UserName'=>$this->getUserName(),
			'UserMail'=>$this->getUserMail(),
			'UserPassword'=>$this->getUserPassword()
		));


	

}

public function UserLogin(){
		include "conn.php";

		$req=$bdd->prepare("SELECT * from users where UserMail=:UserMail AND UserPassword=:UserPassword");
		$req->execute(array(
			'UserMail'=>$this->getUserMail(),
			'UserPassword'=>$this->getUserPassword()
		));

		if($req->rowCount()==0)
		{	

			header("Location:index.php?error=1");
			return false;	
		}
		else{
			while($data=$req->fetch()){
				$this->setUserId($data['UserId']);
				$this->setUserName($data['UserName']);
				$this->setUserMail($data['UserMail']);
				$this->setUserPassword($data['UserPassword']);
				header("Location:Home.php");
				return true;
			}
		} } }


class chat{
	private $ChatId,$ChatUserId,$ChatText;
	public function getChatId(){
		return $this->ChatId;
	}

	public function setChatId($ChatId)
	{
		$this->ChatId=$ChatId;
	}


	public function getChatUserId(){
		return $this->ChatUserId;
	}

	public function setChatUserId($ChatUserId)
	{
		$this->ChatUserId=$ChatUserId;
	}


	public function getChatText(){
		return $this->ChatText;
	}

	public function setChatText($ChatText)
	{
		$this->ChatText=$ChatText;
	}


	public function InsertChatMessage(){
		include "conn.php";
		$req=$bdd->prepare("INSERT into chats(ChatUserId,ChatText) values(:ChatUserId,:ChatText)");
		$req->execute(array(

'ChatUserId'=>$this->getChatUserId(),
'ChatText'=>$this->getChatText()
		));
	}

	public function DisplayMessage(){
		include "conn.php";
		$ChatReq=$bdd->prepare("SELECT * from chats order by ChatId ");
		$ChatReq->execute();
		while($DataChat=$ChatReq->fetch()){
			$UserReq=$bdd->prepare("SELECT * from users where UserId=:UserId");
			$UserReq->execute(array(
'UserId'=>$DataChat['ChatUserId']
			));
			$DataUser=$UserReq->fetch();
			?>

			<span class="UserNameS"><?php echo $DataUser['UserName']; ?></span> <strong style="color:yellow;">says</strong><br>
			<span class="UserMessageS" style="color:red; background-color: #f1f1f1; border-radius: 5px; padding:1.5px; margin:10px; border:2px solid #dedede;"><?php echo htmlspecialchars($DataChat['ChatText']); ?></span><br><br>
		<?php }
	}
}

 ?>