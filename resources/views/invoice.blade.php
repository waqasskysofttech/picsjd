<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <title>Order Confirmation</title>

</head>

<style>

    table tr:first-child > td > center{

        /*background: #ff0000;*/

    }

</style>

<body>





<table style="background:#fff; border:#000000 1px solid;" width="622" cellspacing="0" cellpadding="0" border="0"

       align="center">

    <tbody>

    <tr class="first">

        <td>

            <center>

                <img src="{{asset('images/logo.png')}}" style="padding: 15px;">
               
            </center>

        </td>

    </tr>

    <tr>

        <td height="1"></td>

    </tr>

    <tr>

        <td style="font-family:Arial, Helvetica, sans-serif;" bgcolor="#f5f9f6">

            <table width="622" cellspacing="0" cellpadding="0" border="0" align="center">

                <tbody>

                <tr>

                    <td style="padding:8px 15px;"><p><strong>Dear {{$orders->fname}} {{$orders->lname}}</strong></p></td>

                </tr>

                <tr>

                    <td style="font-size:13px; line-height:22px; padding:0 15px; margin-bottom:15px;">

                        This email is to let you know that we have received your order.

                        Thank you for shopping with us. Below are your order details:

                    </td>

                </tr>

                <tr style="margin:20px 0; float:left;height:86px;     background-color: #000000;" bgcolor="#68A13E">

                    <td width="622">

                        <table style="margin-top:20px;" width="580" cellspacing="0" cellpadding="0" border="0"

                               align="center">

                            <tbody style="font-size: 20px;">

                            <tr style="color:#fff;  ">



                                <td width="251" align="left ">Order number : <b>{{$orders->id}}</b></td>

                                

                                

                                <td width="50">&nbsp;</td>




                              


                            

                                <td width="251" align="right">Order date : {{date('M d,Y', strtotime($orders->created_at))}}</td>

                            </tr>
                            
                            

                            <tr style="color:#fff">



                    



                                <td width="25">&nbsp;</td>

                                <td width="25">&nbsp;</td>

                                <?php

                                $total = 0;

                                foreach($order_detail as $od): 

                                    $total += $od['sub_total'];

                                endforeach;

                                ?>





                                <td style="font-size: 22px;padding: 5px 0px;" id="total_sum" width="251" align="right">Total Amount: ${{$total}}</td>

                            </tr>

                            </tbody>

                        </table>

                    </td>

                </tr>

                <div class="text-center">

                    
              
              
                </div>
                
                <tr>

                    <td style="font-size:13px; line-height:22px; padding:0 15px; margin-bottom:15px;">

                        <!-- <strong>

                            Expected delivery within 5 working days (please allow for up to 10 working days for delivery outside the UK).

                        </strong><br /> -->

                       

                        <!--Your delivery address: <?/*=$userdata['signup_address1']*/?> <br>-->

                        <!-- Scedule date & time : <strong></strong> -->

                    </td>

                </tr>



                <tr style="margin:0px 0; float:left; height:50px;" bgcolor="#f6f5f5">

                    <td width="622">

                        <table style="margin-top:15px;" width="580" cellspacing="0" cellpadding="0" border="0"

                               align="center">

                            <tbody>

                           
                            


                            <tr style="color:#000;  ">

                                <td style="font-size:28px; text-decoration: underline;" width="251" align="center ">Order details</td>

                            </tr>

                            </tbody>

                        </table>

                    </td>

                </tr>



                <tr style="float:left; padding:0 0 10px;border-bottom: 1px solid #cbcaca; margin-bottom:15px; "

                    bgcolor="#f6f5f5">



                    <td width="622">

                        <table style="margin-top:20px;" width="580" cellspacing="0" cellpadding="0" border="0"

                               align="center">

                            <tbody>

                                <?
                                foreach($order_detail as $od): ?>
                                   
                                <tr style="color:#000; height:30px; font-size:16px;  ">

                                    <td colspan="3" width="251" align="left">

                                        <b>Product Name :</b> {{$od['name']}} 
                                        <p><b>Qty :</b> {{$od['quantity_selected']}}
                                    
                                        <b></b></p>

                                    </td>

                                </tr>

                                    <tr style="color:#000; height:30px; font-size:16px; ">

                                        <td width="251" align="left ">

<b>Sub total</b> <?php echo "(Item : ".$od['quantity_selected']." X $".$od['price'].")";?>

                                        </td>

                                        <td width="50">&nbsp;</td>

                                        <td width="251" align="right">${{$od['price']*$od['quantity_selected']}} </td>

                                    </tr>

                                <?

                                endforeach;?>





                            <tr>

                                <td colspan="3" style="color:#000;font-weight:bold; font-size:16px;">

                                    <hr>

                                </td>

                            </tr>

                            <tr style="color:#000;height:30px;">

                                <td width="251" align="left">Sub Total</td>

                                <td width="50">&nbsp;</td>

                                <td width="251" align="right">

                                ${{$orders->total_amount}}

                                </td>

                            </tr>
                            
                           
                            


                            

                            



                            <tr style="color:#000;height:30px;">

                                <td width="251" align="left">Total</td>

                                <td width="50">&nbsp;</td>

                                <td width="251" align="right">

                                ${{$orders->total_amount}}

                                </td>

                            </tr>

                            

                            </tbody>

                        </table>

                    </td>

                </tr>


               


               <tr>

                    <td style="font-size:16px; line-height:22px; padding:0 15px; margin-bottom:15px; padding-bottom:10px;">

                        To make sure our emails reach your inbox, please add <a

                            href="mailto:{{$config['EXTERNALEMAIL']}}">{{$config['EXTERNALEMAIL']}}</a> to your safe

                        list or address book.<br>

                        <!-- Please note that there will be a delivery charge for re-sending returned items if an incorrect address has been provided. <br /> -->

                    </td>

                </tr>

                </tbody>

            </table>

        </td>

    </tr>

    </tbody>

</table>

</body>

</html>