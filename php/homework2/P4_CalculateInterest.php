<form>
<label>Amount</label>
<input type="text" name="amount"/><br/>

<input type="radio" name="currency" value="USD" checked/>USD
<input type="radio" name="currency" value="EUR"/>EUR
<input type="radio" name="currency" value="BGN"/>BGN<br/>

<label>Compound Interest Amount</label>
<input type="text" name="compound"/><br/>

<select name="period">
    <option value="6">6 Months</option>
    <option value="12">1 Year</option>
    <option value="24">2 Years</option>
    <option value="60">5 Years</option>
</select>
<input type="submit" value="Calculate" name="calculate"/>
</form>
<?php
    if (isset($_GET["calculate"])){
        $amount = floatval($_GET["amount"]);
        $currency = $_GET["currency"];
        $compound = floatval($_GET["compound"]);
        $period = $_GET["period"];

        $monthPercent = $compound / 12;
        $monthPercent = ($monthPercent + 100)/100;

        for ($i=0; $i<$period; $i++){
            $amount *= $monthPercent;
        }

        if ($currency == "USD") {
            echo "$ ".round($amount, 2);
        }else {
            echo round($amount, 2)." ".$currency;
        }
    }