<h1>Gästebuch</h1>

<p>Bitte schreib etwas in mein Gästebuch!</p>

<?php if(count($errors) > 0): ?>
    <ul class="alert alert-block">
        <?php foreach($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php if($newEntry): ?>
    <div class="alert alert-success">
        <strong>Danke!</strong> Für Eintrag. OK, hat klappd!
    </div>
<?php endif; ?>

<form action="index.php?page=guestbook.php" method="post">
    <div class="control-group">
        <label class="control-label" for="name">Dein Name</label>
        <input value="<?= $name ?>" name="name" type="text" class="input-xlarge" id="name">
    </div>
    <div class="control-group">
        <label class="control-label" for="message">Dein Nachricht</label>
        <textarea name="message" rows="6" class="input-xlarge" id="message"><?= $message ?></textarea>
    </div>
    <div class="control-group">
        <button type="submit" class="btn btn-primary">Eintragen!</button>
    </div>
</form>
<hr>
<div class="guestbook">
    <?php foreach($guestbookEntries as $entry): ?>
    <div class="guestbook__entry">
        <h4><?= $entry['name'] ?></h4>
        <div><?= $entry['message'] ?></div>
        <hr>
    </div>
    <?php endforeach; ?>
</div>