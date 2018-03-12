<?php
/**
 * Created by PhpStorm.
 * User: Hazem1
 * Date: 12/14/2017
 * Time: 4:39 PM
 */
$address="3434lsdjkfgh";
if(isset($_GET["address"]))
{$address=urldecode($_GET["address"]);}
echo "Address is " . $address;

?>
<script type="text/javascript">
  var rprAvmWidgetOptions =
  {
      Token : "0BFF95BC-B858-496F-B7B7-3487779281AE",
    Query : "<?=$address?>",
    CoBrandCode : "btsrealtyusa",
    ShowRprLinks : true
  }
</script>
<script type="text/javascript" src="//www.narrpr.com/widgets/avm-widget/widget.ashx/script"></script>