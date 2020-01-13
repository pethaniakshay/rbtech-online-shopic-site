<?php
session_start();
// This is for getting details of user
if($_SESSION["checkout"]!="yes" || $_SESSION["cart_item"]!="yes" || $_SESSION["rbtechemail"]=="" || $_SESSION["address_verify"]!="yes")
{
    ?>
    <script type="text/javascript">
        window.location="product.php";
    </script>
    <?php
}
else {
    $_SESSION["payment"]="";
    include "connect.php";


    $res = mysqli_query($link, "select * from user_detail WHERE email='$_SESSION[rbtechemail]'") or die(mysqli_errno($link));
    while ($row = mysqli_fetch_array($res)) {
        $name = $row['name'];
        $email = $row['email'];
        $address = $row['address'];
        $city = $row['city'];
        $state = $row['state'];
        $pincode = $row['pincode'];
        $mobile = $row['mobile'];

    }

// Merchant key here as provided by Payu
    $MERCHANT_KEY = "71oZzFr5";

// Merchant Salt as provided by Payu
    $SALT = "qRJe8eAEmV";

// End point - change to https://secure.payu.in for LIVE mode
    $PAYU_BASE_URL = "https://test.payu.in/";

    $action = '';

    $posted = array();
    if (!empty($_POST)) {
        //print_r($_POST);
        foreach ($_POST as $key => $value) {
            $posted[$key] = $value;

        }
    }

    $formError = 0;

    if (empty($posted['txnid'])) {
        // Generate random transaction id
        $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    } else {
        $txnid = $posted['txnid'];
    }
    $hash = '';
// Hash Sequence
    $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
    if (empty($posted['hash']) && sizeof($posted) > 0) {
        if (
            empty($posted['key'])
            || empty($posted['txnid'])
            || empty($posted['amount'])
            || empty($posted['firstname'])
            || empty($posted['email'])
            || empty($posted['phone'])
            || empty($posted['productinfo'])
            || empty($posted['surl'])
            || empty($posted['furl'])
            || empty($posted['service_provider'])
        ) {
            $formError = 1;
        } else {
            //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
            $hashVarsSeq = explode('|', $hashSequence);
            $hash_string = '';
            foreach ($hashVarsSeq as $hash_var) {
                $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
                $hash_string .= '|';
            }

            $hash_string .= $SALT;


            $hash = strtolower(hash('sha512', $hash_string));
            $action = $PAYU_BASE_URL . '_payment';
        }
    } elseif (!empty($posted['hash'])) {
        $hash = $posted['hash'];
        $action = $PAYU_BASE_URL . '_payment';
    }
    ?>
    <html>
    <head>
        <script>
            var hash = '<?php echo $hash ?>';
            function submitPayuForm() {
                if (hash == '') {
                    return;
                }
                var payuForm = document.forms.payuForm;
                payuForm.submit();
            }
        </script>
    </head>
    <body onload="submitPayuForm()">
    <h2>Please wait, we are transferring to you payment gateway</h2>
    <br/>
    <?php if ($formError) { ?>

        <span style="color:red">Please fill all mandatory fields.</span>
        <br/>
        <br/>
    <?php } ?>
    <div style="visibility: hidden">
        <form action="<?php echo $action; ?>" method="post" name="payuForm">
            <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>"/>
            <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
            <input type="hidden" name="txnid" value="<?php echo $txnid ?>"/>
            <table>
                <tr>
                    <td><b>Mandatory Parameters</b></td>
                </tr>
                <tr>
                    <td>Amount:</td>
                    <td><input name="amount" value="<?php echo $_SESSION["sub_total"]; ?>"/></td>
                    <td>First Name:</td>
                    <td><input name="firstname" id="firstname" value="<?php echo $name; ?>"/></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input name="email" id="email" value="<?php echo $email; ?>"/></td>
                    <td>Phone:</td>
                    <td><input name="phone" value="<?php echo $mobile; ?>"/></td>
                </tr>
                <tr>
                    <td>Product Info:</td>
                    <td colspan="3"><textarea
                            name="productinfo"><?php echo $_SESSION["cookie_product_name"]; ?></textarea></td>
                </tr>
                <tr>
                    <td>Success URI:</td>
                    <td colspan="3"><input name="surl" value="http://couponsduniya.xyz/rbtech/success.php?email=$email"
                                           size="64"/></td>
                </tr>
                <td>Failure URI:</td>
                <tr>
                    <td colspan="3"><input name="furl" value="http://couponsduniya.xyz/rbtech//failure.php" size="64"/></td>
                </tr>

                <tr>
                    <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64"/></td>
                </tr>

                <tr>
                    <td><b>Optional Parameters</b></td>
                </tr>

                <tr>
                    <td>Address1:</td>
                    <td><input name="address1" value="<?php echo $address; ?>"/></td>
                    <td>Address2:</td>
                    <td><input name="address2" value="<?php echo $address; ?>"/></td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input name="city" value="<?php echo $city; ?>"/></td>
                    <td>State:</td>
                    <td><input name="state" value="<?php echo $state; ?>"/></td>
                </tr>
                <tr>
                    <td>Country:</td>
                    <td><input name="country" value="India"/></td>
                    <td>Zipcode:</td>
                    <td><input name="zipcode" value="<?php echo $pincode; ?>"/></td>
                </tr>

                <?php if (!$hash) { ?>
                    <td colspan="4"><input type="submit" name="submit1" value="Submit"/></td>
                <?php } ?>
                </tr>
            </table>
        </form>
    </div>


    <script type="text/javascript">
        document.forms["payuForm"].submit();

    </script>

    </body>
    </html>
    <?php
}
?>