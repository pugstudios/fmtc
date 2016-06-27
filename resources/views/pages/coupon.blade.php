

<div id="coupon">

    <br>

    <center>

        <h1>{{ $couponJSON -> rsPod -> cTitle }}</h1>
        <h2>Use coupon code: {{ $couponJSON -> aDeals[0][0] -> cCode }}</h2>
        <p>Description: {{ $couponJSON -> aDeals[0][0] -> cLabel }}</p>
        <p>Merchant: {{ $couponJSON -> aDeals[0][0] -> cMerchant }}</p>

        <input type="button" class="print" onClick="window.print()" value="Print Voucher"/>



    </center>
</div>