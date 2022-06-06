<section class="page">
	<div class="container">

		<div class="login_logo"></div>
		<h2 class="admin_title">Панель Администратора</h2>

		<?php 

		echo $this->Form->create('User');
		echo $this->Form->input('username', array('label' => 'Логин'));
		echo $this->Form->input('password', array('label' => 'Пароль'));
		echo $this->Form->end('Войти');

		 ?>
		
	</div>
</section>
<?php 
    $logo = $this->Common-> get_from_pageByid(5);
?>
<style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 450px;
  padding: 6% 0 0;
  margin: auto;
}
.login-page .form {
  position: relative;
  z-index: 1;
  float: none !important;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 30px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 0 0 15px;
  color: red;
  font-size: 14px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background-color: #545454;
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
.form form .submit input {
    font-family: "Roboto", sans-serif;
    text-transform: uppercase;
    outline: 0;
    background: #333;
    width: 100%;
    border: 0;
    padding: 15px;
    color: #FFFFFF;
    font-size: 14px;
    -webkit-transition: all 0.3 ease;
    transition: all 0.3 ease;
    cursor: pointer;
}
.form form .submit input:hover, 
.form form .submit input:active, 
.form form .submit input:focus {
    background: #111;
}

.login_logo{
  width: 100%;
  height: 70px;
  margin-bottom: 30px;
  background: url('/img/logo.svg') center / contain no-repeat;
}
.admin_title{
  font-size: 20px;
  margin-bottom: 30px;
  font-family: 'Arial';
  font-weight: bold;
  border: none;
}
.admin_pass_reset{
  display: table;
  margin: 20px auto 0;
  font-size: 14px;
  color: #333;
  text-decoration: none;
}
.admin_pass_reset:hover{
  text-decoration: underline;
}

</style>