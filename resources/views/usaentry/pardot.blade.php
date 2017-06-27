<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>キャンペーン申し込み | WiFi Router Campaign</title>
</head>
<body>
<main>
    <form name="form" action="{{ $pardotFormHandlerEndpoint }}" method="post">
        {!! Form::token() !!}
        <input type="hidden" name="Coupon_code" value="{{ $coupon_code }}"/>
        <input type="hidden" name="language" value="{{ $language }}"/>
        <input type="hidden" name="origin" value="{{ $origin }}"/>
        <input type="hidden" name="E_ticket_number" value="{{ $Reservation_number }}"/>
        <input type="hidden" name="First_Name" value="{{ $First_Name }}"/>
        <input type="hidden" name="Last_Name" value="{{ $Last_Name }}"/>
        <input type="hidden" name="Email" value="{{ $Email }}"/>
        <input type="hidden" name="Email_confirm" value="{{ $Email_confirm }}"/>
        <input type="hidden" name="Country" value="{{ $Country }}"/>
        <input type="hidden" name="Country_code" value="{{ $Country_code }}"/>
        <input type="hidden" name="Sex" value="{{ $Sex }}"/>
        <input type="hidden" name="Tel" value="{{ $Tel }}"/>
        <input type="hidden" name="AMC" value="{{ $AMC }}"/>
        <input type="hidden" name="E_newsletter" value="{{ $E_newsletter }}"/>
        <input type="hidden" name="Privacy" value="{{ $Privacy }}"/>
        <input type="hidden" name="status" value="New"/>
        <input type="hidden" name="Salutation_for_email" value="{{ $Salutation_for_email }}"/>
        <input type="hidden" name="FlightNo" value="{{ $FlightNo }}"/>
        <input type="hidden" name="FlightNoUSA" value="{{ $FlightNoUSA }}"/>
        <input type="hidden" name="Dept_date" value="{{ $DepartureDateYear }}-{{ $DepartureDateMonth }}-{{ $DepartureDateDay }}"/>
        <input type="hidden" name="X2016_ANAUSA" value="TRUE"/>
        <input type="hidden" name="Applied_Date" value="{{ $Applied_Date }}"/>

    </form>
    <script type="text/javascript">
        window.onload = function () {
            document.form.submit()
        }
    </script>
</main>
@include('usaentry.tag-endbody-before')
</body>
</html>
