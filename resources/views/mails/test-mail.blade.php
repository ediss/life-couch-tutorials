<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting"> <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


<style>
    body {
        color:black;
        max-width: 700px;
    }
    .wrapper2{
        display: flex;
        align-items: center;
        /* margin-top: 25%; */
    }

    .first-col {
        display: flex;
        flex-direction: column;
    }

    .second-col {
        margin-left: 16px;
        display: flex;
        flex-direction: column;
    }

    .bank-table {
        border:1px solid #333;
        border-spacing: 0 !important;
		border-collapse: collapse !important;
		table-layout: fixed !important;
		margin: 0 auto !important;
		margin-top: 15px !important;
    }

    .bank-table thead {
        background-color: #cccccc;
        text-align: center;
    }

    .bank-table tbody{
        text-align: center;
    }

    .bank-table th {
        border: 1px solid #333;
    }

    .bank-table td { 
        border: 1px solid #333;
        mso-table-lspace: 0pt !important;
			mso-table-rspace: 0pt !important;
    }

    .text{
        margin-top: 5%;
        margin-bottom: 5%;
    }

</style>
</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;">

    <div class="text" style="padding: 0 3em; text-align: center;">
        <h2>ZDRAVO {{ $name }}!</h2>
        <p>Hvala na prijavi za kurs <a
                href="{{route('single-course', $course_slug)}}#course-content">{{$course_name}}</a>
        </p>
        <div class="icon">
            <a href="#">
                <img src="images/002-play-button.png" alt=""
                    style="width: 60px; max-width: 600px; height: auto; margin: auto; display: block;">
            </a>
        </div>


        <p>Izabrali ste metod plaćanja: {{ $payment_method }}</p>

        <p>Instrukcije za plaćanje iz inostranstva:</p>
    </div>
    <div class="wrapper">

        <table>
            <tr>
                <td><u>Beneficiary: </u></td>
                <td><b>Maja Vuckovic</b></td>
            </tr>

            <tr>
                <td><u>Account:</u></td>
                <td><b>UA053005280000000262041825905</b></td>
            </tr>

            <tr>
                <td><u>Beneficiary's bank:</u></td>
                <td><b>OTP BANK JSC</b></td>
            </tr>
            <tr>
                <td></td>
                <td><b>01601, Kyiv, 43 Zhylyanska Str.</b></td>
            </tr>
            <tr>
                <td><u>SWIFT code:</u></td>
                <td><b>OTPVUAUK</b></td>
            </tr>
        </table>
    </div>

    <p><b>Correspondent bank EUR:</b></p>
    <table width="100%" class="bank-table">
        <thead>
            <tr>
                <th>Bank name</th>
                <th>City</th>
                <th>Country</th>
                <th>Account No.</th>
                <th>SWIFT code</th>
                <th>Clearing code</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td> <i>Commerzbank AG</i></td>
                <td>Frankfurt/Main</td>
                <td>Germany</td>
                <td>400 8880064 01</td>
                <td>COBADEFF</td>
                <td></td>
            </tr>
            <tr>
                <td><i>Deutsche Bank AG</i></td>
                <td>Frankfurt/Main</td>
                <td>Germany</td>
                <td>100 9474974 0000</td>
                <td>DEUTDEFF</td>
                <td></td>
            </tr>
        </tbody>

      </table>
</body>

</html>