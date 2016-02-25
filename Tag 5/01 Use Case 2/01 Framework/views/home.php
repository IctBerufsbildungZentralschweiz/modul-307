<h1 class="form-title">Mitmachen &amp; Gewinnen!</h1>

<p>Füllen Sie das folgende Formular aus um an unserem Gewinnspiel teilzunehmen.</p>

<form action="index.php" method="post" id="gewinnspiel">

    <fieldset>
        <legend class="form-legend">Gewinncode</legend>
        <div class="form-group">
            <label class="form-label" for="code">Ihr Gewinncode</label>
            <input class="form-control" type="text" id="code" name="code" value="">
        </div>
    </fieldset>

    <fieldset>
        <legend class="form-legend">Kontaktdaten</legend>
        <div class="form-group">
            <label class="form-label" for="anrede">Wählen Sie eine Anrede</label>
            <select class="form-control" id="anrede" name="anrede">
                <option value="Frau">Frau</option>
                <option value="Herr">Herr</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label" for="vorname">Ihr Vorname</label>
            <input class="form-control" type="text" id="vorname" name="vorname" value="">
        </div>

        <div class="form-group">
            <label class="form-label" for="nachname">Ihr Nachname</label>
            <input class="form-control" type="text" id="nachname" name="nachname" value="">
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Ihre Email-Adresse</label>
            <input class="form-control" type="email" id="email" name="email" value="">
        </div>
    </fieldset>

    <div class="form-actions">
        <input class="btn btn-primary" type="submit" value="Gewinncode einlösen!">
        <a href="http://www.google.com" class="btn">Abbrechen</a>
    </div>

</form>