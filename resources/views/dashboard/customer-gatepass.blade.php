@extends('layouts.dashboard')

@section('title', 'Customer')

@section('content')




        <div class="row">

            <div class="col-md-12">

                        

                <div class="portlet light bordered" id="portlet-border" >

                    <div class="portlet-title" id="portlet-title" >

                        <div class="caption font-dark" >

                        </div>

                        <div class="tools"> </div>

                    </div>

                    <div class="portlet-body">
                    <div class="row">
                      @php
                      $line = "";
                      foreach($customer_orders as $co) {
                        $line.='Product Type:'.utf8_decode(utf8_encode($co->product_type)).'\nProduct Quantity:'. $co->quantity.'\nRate:'. $co->rate .'\nTransport Type:'.utf8_decode(utf8_encode($co->transport_type)).'\nTransport Cost:'.$co->transport_bill.'\nTotal:'. ($co->quantity * $co->rate.'\n\n') ;
                      }
                    

                      // echo "<pre>";
                      // var_dump(implode("\n", $line));
                      // echo "</pre>";
                      @endphp
                           <div class="col-md-3"></div>
                           <div class="col-md-6">
                           <center><button class="btn btn-info" id="print_receipt">Print Receipt</button></center>
                             <div class="print-body" id="print-body" style="border:1px solid #ccc;border-radius: 2px;padding: 10px; box-shadow: 1px 1px 3px rgba(0,0,0,0.1);background: #FFFFFF;margin-top: 10px;">
                             <div class="row">
                               <div class="col-md-4 col-sm-4 col-xs-4"></div>
                               <div class="col-md-4 col-sm-4 col-xs-4">
                                 <div class="text-center" style="font-weight: bold;">Receipt</div>
                               </div>
                               <div class="col-md-4 col-sm-4 col-xs-4">
                                 <div id="barcode" style="border:1px solid #333;width:50%;background: #fcfcfc;">
                                
                                  <svg id="barcoder" style="width: 100%;"></svg>
                                 </div>
                               </div>
                             </div>
                               <div class="row">
                                 <div class="col-md-12">
                                   <div class="text-left" style="font-weight: bold;">Date:{{date('Y-m-d')}}</div>
                                   <div class="text-left" style="font-weight: bold;">Customer name:{{$customer->name}}</div>
                                   <div class="text-left" style="font-weight: bold;">Address:@if($customer->address){{$customer->address}}@else {{"Not Available"}}@endif</div>
                                   <table class="table table-striped table-bordered table-hover" style="width: 100%;margin-top: 10px;">
                                     <thead>
                                       <tr>
                                         <th style="">Product Type</th>
                                         <th style="">Quantity</th>
                                         <th style="">Rate</th>
                                         <th style="">Total Amount</th>  
                                       </tr>
                                     </thead>
                                     <tbody>
                                     @foreach($customer_orders as $co)
                                       <tr>
                                         <td>{{$co->product_type}}</td>
                                         <td>{{$co->quantity}}</td>
                                         <td>{{$co->rate}}</td>
                                         <td>{{$co->quantity * $co->rate }}</td>
                           
                                       </tr>
                                       @endforeach
                                     </tbody>
                                   </table>
                                 </div>
                                 
                               </div>
                               <div class="row">
                                 <div class="col-4"></div>
                                 <div class="col-4">
                                   <div class="text-center" style="font-family: monospace,sans-serif,helvetica;">
                                     Total Amount Due:{{$subtotal?$subtotal:0}}
                                   </div>
                                   <div class="text-center" style="font-family: monospace,sans-serif,helvetica;">
                                     Amount Paid:{{$payment_amount?$payment_amount:0}}
                                   </div>
                                   <div class="text-center" style="font-family: monospace,sans-serif,helvetica;">
                                     Balance Due:{{$balance_due}}
                                   </div>
                                 </div>
                                 <div class="col-4"></div>
                               </div>
                               <div class="row" id="vanish">
                                 <div class="col-md-8 col-sm-8 col-xs-8" style="padding-right: 0px;">
                                   <div style="border:2px solid #AAAAAA;border-right-width: 0px; height: 30px;margin-top: 20px;text-align: left;">Product Received</div> 
                                 </div>
                                 <div class="col-md-4 col-sm-4 col-xs-4" style="padding-left: 0px;">
                                   <div style="border:2px solid #AAAAAA; height: 80px;"></div>
                                 </div>
                               </div>
                               <div class="row" style="margin-top: 20px;">
                                 <div class="col-md-12" >
                                   <hr style="border:1px solid #AAAAAA">
                                   <div class="text-center" style="font-weight: bold;">Rana Bricks</div>
                                   <div class="text-center">Monirampur,Naoyapara,Ovoinogor,Jessore</div>
                                   <div class="text-center">Office Number:01758-56295</div>
                                   <div class="text-center">Report Contact:</div>
                                   <div class="text-center">Please keep safe the cash memo...</div>
                                 </div>
                               </div>
                             </div>
                             <div class="row">
                               <div class="col-md-12">
                                <center><button id="print_qrCode" class="btn btn-info" style="margin-top: 20px;">QR Code Print</button></center>
                                 <div class="qrCodeBody" id="qrCodeBody" style="border:1px solid #ccc;border-radius: 2px;padding: 10px; box-shadow: 1px 1px 3px rgba(0,0,0,0.1);margin-top: 8px;">
                                 <div class="text-center" style="font-weight: bold;font-size: 25px;">Gatepass</div>
                                 <div class="text-center">Transport:</div>
                                   <center><div id="qrcodeCanvas" style="margin-top: 20px;"></div></center>
                                   <div class="text-center" style="font-family: monospace,sans-serif,helvetica;">{{date('Y/m/d')}}</div>
                                 </div>
                                 
                               </div>
                             </div>
                           </div>
                           <div class="col-md-3">
                             
                             
                           </div>
        
                    </div>
                              
                    </div>


                    </div>

                </div>



          
            
        </div><!-- ROW-->


@section('scripts')

<script type="text/javascript">
 $("#print_receipt").click(function(){


  // $("#portlet-border").css("border-width","0px")
  // $("#portlet-title").css("border-bottom-width","0px")

  $("#print_receipt").hide();
  $(".portlet.light.bordered>.portlet-title").css("border-bottom","0px solid #eef1f5");
  // $(".portlet.light .bordered").css("display","none");
  // $(".portlet.bordered").css("border","0px solid #e6e9ec!important");

$("#qrCodeBody").hide();
  $("#print_qrCode").hide();
  $("#vanish").show();
  $(".page-title").hide();
  //$("#barcode").hide();
        window.print();
        $("#vanish").hide();
        $(".portlet.light.bordered>.portlet-title").css("border-bottom","1px solid #eef1f5");
        // $(".portlet.light.bordered").css("border","1px solid #e7ecf1!important");
        // $(".portlet.bordered").css("border","2px solid #e6e9ec!important");
         $(".page-title").show();
        $("#qrCodeBody").show();
        $("#print_qrCode").show();
        $("#print_receipt").show();
        //$("#barcode").show();
       // $("#portlet-border").css("border","1px solid #000")
       // $("#portlet-title").css("border-bottom-width","1px")
      
 });

	function printP() {
		
		}
</script>
<script type="text/javascript">
  
  var Utf8 = {

 


    // public method for url encoding


    encode : function (string) {


        string = string.replace(/\r\n/g,"\n");


        var utftext = "";

 


        for (var n = 0; n < string.length; n++) {

 


            var c = string.charCodeAt(n);

 


            if (c < 128) {


                utftext += String.fromCharCode(c);


            }


            else if((c > 127) && (c < 2048)) {


                utftext += String.fromCharCode((c >> 6) | 192);


                utftext += String.fromCharCode((c & 63) | 128);


            }


            else {


                utftext += String.fromCharCode((c >> 12) | 224);


                utftext += String.fromCharCode(((c >> 6) & 63) | 128);


                utftext += String.fromCharCode((c & 63) | 128);


            }

 


        }

 


        return utftext;


    },

 


    // public method for url decoding


    decode : function (utftext) {


        var string = "";


        var i = 0;


        var c = c1 = c2 = 0;

 


        while ( i < utftext.length ) {

 


            c = utftext.charCodeAt(i);

 


            if (c < 128) {


                string += String.fromCharCode(c);


                i++;


            }


            else if((c > 191) && (c < 224)) {


                c2 = utftext.charCodeAt(i+1);


                string += String.fromCharCode(((c & 31) << 6) | (c2 & 63));


                i += 2;


            }


            else {


                c2 = utftext.charCodeAt(i+1);


                c3 = utftext.charCodeAt(i+2);


                string += String.fromCharCode(((c & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));


                i += 3;


            }

 


        }

 


        return string;


    }

 

}


</script>
<script src="https://cdn.jsdelivr.net/jsbarcode/3.6.0/JsBarcode.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
<script src="http://jeromeetienne.github.io/jquery-qrcode/src/jquery.qrcode.js"></script>
<script src="http://jeromeetienne.github.io/jquery-qrcode/src/qrcode.js"></script>
<script type="text/javascript">
  JsBarcode("#barcoder", decodeURIComponent({{$id}}), {
  
  lineColor: "#000",
  width: 1,
  height: 20,
  fontSize:13,
  displayValue: true
});

  var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$("#vanish").hide();

$('#cmd').click(function () {   
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});

jQuery('#qrcodeCanvas').qrcode({text: Utf8.encode('{{$line}}') , }); 
$("#print_qrCode").click(function(){
    $("#print-body").hide();
      $("#print_qrCode").hide();
       $("#print_receipt").hide();
      window.print();
        $("#print_qrCode").show();
         $("#print-body").show();
          $("#print_receipt").show();
});

</script>

@endsection



@endsection





