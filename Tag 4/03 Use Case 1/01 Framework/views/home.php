<h1>Ihre Bestellung</h1>

<form action="index.php" id="orderForm" method="post">

    <ul class="product-list">

        <!-- Beispiel Eintrag für ein Produkt -->
        <!-- Generiere diese Liste aus dem $products Array -->

            <li class="product-list__entry">

                <div class="product-information">
                    <h3 class="product-name">Produktname</h3>
                    <p>2'000 SFr.</p>
                </div>

                <fieldset class="product-attributes">

                    <div class="input-group">
                        <label for="size-art-123">Grösse</label>
                       
                        <select name="Order[art-123][size]" id="size-art-123">
                            <option value="S">
                                Small
                            </option>
                        </select>
                    </div>

                    <div class="input-group">
                        <label for="quantity-art-123">Anzahl</label>
                        <input type="number"
                               value="1"
                               min="1"
                               max="10"
                               class="js-quantity"
                               name="Order[art-123][quantity]"
                               id="quantity-art-123">
                    </div>
                </fieldset>
            </li>
            
        <!-- Ende Beispieleintrag -->

    </ul>

    <h2>Kundendaten</h2>

    <div class="additional-info">

        <fieldset class="additional-info__column">

            <div class="input-group">
                <label for="email">Ihre Email</label>
                <input type="email" id="email" value="" name="Customer[email]">            
            </div>

            <div class="input-group">
                <label for="password">Ihr Passwort</label>
                <input type="password" id="password" value="" name="Customer[password]">            
            </div>

            <div class="form-actions">
                <button class="btn" type="submit">Bestellung abschliessen &rarr;</button>
            </div>

        </fieldset>

        <div class="additional-info__column">
            
            <table class="table-totals">
                <tr>
                    <th>Total (exkl. MwSt.)</th>
                    <td id="total"></td>
                </tr>
                <tr>
                    <th>MwSt.</th>
                    <td id="vat"></td>
                </tr>
                <tr>
                    <th>Total (inkl. MwSt.)</th>
                    <td id="total-vat"></td>
                </tr>
            </table>

        </div>
    </form>
