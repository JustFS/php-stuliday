<?php
require_once('connect.php');

// UPDATE POST
if (!empty($_POST['lastName']) || !empty($_POST['firstName']) || !empty($_POST['email'])) {

  $lastName = htmlspecialchars($_POST['lastName']);
  $firstName = htmlspecialchars($_POST['firstName']);
  $email = htmlspecialchars($_POST['email']);
  $id = $_SESSION['id'];

  $sth = $db->prepare("UPDATE users SET lastName=:lastName, firstName=:firstName, email=:email WHERE id=$id");

  $sth->bindValue(':lastName', $lastName);
  $sth->bindValue(':firstName', $firstName);
  $sth->bindValue(':email', $email);

  $sth->execute();

  header('Location: /php-stuliday/index.php');
};

function counter()
{
  global $db;
  $id = $_SESSION['id'];
  $sql = $db->query("SELECT COUNT(*) FROM annonces WHERE author_article=$id");

  $annoncesCount = $sql->fetch();

  return $annoncesCount[0];
}

function displayUserInfo()
{
  global $db;
  $id = $_SESSION['id'];
  $sql = $db->query("SELECT * FROM users WHERE id=$id");
  $sql->setFetchMode(PDO::FETCH_ASSOC);

  while ($user = $sql->fetch()) {
?>
    <div class="form-group">
      <label for="lastName">Nom</label>
      <input type="text" name="lastName" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Renseigner votre nom" value="<?= $user['lastName']; ?>">
    </div>
    <div class="form-group">
      <label for="firstName">Prénom</label>
      <input type="text" name="firstName" id="exampleInputPassword" placeholder="Renseigner votre prénom" value="<?= $user['firstName']; ?>">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="exampleInputEmail" placeholder="Renseigner votre Email" aria-describedby="emailHelp" value="<?= $user['email']; ?>">
    </div>
<?php
  }
}

function displayAllUsers()
{
  global $db;
  $sql = $db->query("SELECT * FROM users");
  $sql->setFetchMode(PDO::FETCH_ASSOC);

  while ($user = $sql->fetch()) {
  ?>
    <div class="card">
      <h2>User n° <?= $user['id']; ?></h2>
      <p><?= $user['email']; ?></p>
    </div>
<?php
  }
};
