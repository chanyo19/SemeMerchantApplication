
@extends('layouts.common1')
<?php
//dd($appointment);
?>
@section('links')


@endsection
@section('content')

        <div class="container-fluid">


            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div id="invoice">

                                        <div class="toolbar hidden-print">
                                            <div class="text-right">
                                                <button id="printInvoice" onclick="printout()" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                                                <button class="btn btn-info" onclick="pdf()"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                                                <button class="btn btn-info" onclick="send()"><i class="fa fa-mail-reply"></i> EMAIL</button>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="invoice overflow-auto" id="invoice2">
                                            <div style="min-width: 600px">
                                                <header>
                                                    <div class="row">
                                                        <div class="col">
                                                            <a target="_blank" href="https://lobianijs.com">
                                                               <h1>{{$appointment[0]["merchant"]["merchant_name"]}}</h1>
                                                            </a>
                                                        </div>
                                                        <div class="col company-details">
                                                            <h2 class="name">
                                                                <a target="_blank" href="https://lobianijs.com">
                                                                    {{$appointment[0]["merchant"]["merchant_name"]}}
                                                                </a>
                                                            </h2>
                                                            <div> {{$appointment[0]["merchant"]["address"]}}</div>
                                                            <div> {{$appointment[0]["merchant"]["mobile_number"]}}</div>
                                                            <div> {{$appointment[0]["merchant"]["email"]}}</div>
                                                        </div>
                                                    </div>
                                                </header>
                                                <main>
                                                    <div class="row contacts">
                                                        <div class="col invoice-to">
                                                            <div class="text-gray-light">INVOICE TO:</div>
                                                            <h2 class="to"> {{$appointment[0]["customer"]["full_name"]}}</h2>
                                                            <div class="address">{{$appointment[0]["customer"]["address"]}}</div>
                                                            <div class="email">{{$appointment[0]["customer"]["email"]}}</div>
                                                        </div>
                                                        <div class="col invoice-details">
                                                            <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                                            <div class="date">Date of Invoice: {{date('Y-m-d')}}</div>

                                                        </div>
                                                    </div>
                                                    <table border="0"  class="table table-full-width" >
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>

                                                            <th class="text-right">SERVICE</th>


                                                        </tr>
                                                        </thead>
                                                       @foreach($services as $index=> $service)

                                                        <tr>
                                                            <td class="no">{{$index+1}}</td>
                                                            <td class="text-right"><h3>

                                                                        {{$service}}

                                                                </h3>

                                                            </td>

                                                        </tr>

                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">SUBTOTAL</td>
                                                            <td>Rs.{{$appointment[0]["amount"]}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">GRAND TOTAL</td>
                                                            <td>Rs.{{$appointment[0]["amount"]}}</td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                    <div class="thanks">Thank you!</div>
                                                    <div class="notices">
                                                        <div>NOTICE:</div>
                                                        <div class="notice">NOTICE about invoice</div>
                                                    </div>
                                                </main>
                                                <footer>
                                                    Invoice was created on a computer and is valid without the signature and seal.
                                                </footer>
                                            </div>
                                            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                                            <div></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



@stop
@section('scripts')
<script>
    function printout() {

        var divContents = $("#invoice2").html();
        var printWindow = window.open('', '', 'height=400,width=800');
        printWindow.document.write('<html><head><title>DIV Contents</title>');

        printWindow.document.write('<link rel="stylesheet"  href="{{asset('css/material-dashboard.css?v=2.1.0')}}">');
        printWindow.document.write('<link rel="stylesheet" href="{{asset('assets/css/invoice.css')}}">');
        printWindow.document.write('</head><body >');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    }
    function pdf(){
        let doc = new jsPDF('p','pt','a4');
        doc.addHTML(document.getElementById('invoice2'),function() {
            doc.save('html.pdf');
        });
        var divContents = $("#invoice2").html();
        var printWindow = window.open('', '', 'height=400,width=800');
        printWindow.document.write('<html><head><title>DIV Contents</title>');

        printWindow.document.write('<link rel="stylesheet"  href="{{asset('css/material-dashboard.css?v=2.1.0')}}">');
        printWindow.document.write('<link rel="stylesheet" href="{{asset('assets/css/invoice.css')}}">');
        printWindow.document.write('</head><body >');
        printWindow.document.write(divContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();

       // console.log(printWindow.document.body);
    }
    function send(){
        $.ajax({
            method:"post",

            data:{
                _token: "{{ csrf_token() }}",
              body: $("#invoice2").html(),
              mail:$('.email').html()
            },
            url:"/send-invoice",
            success:function (res) {

                console.log(res);
            },


        });
    }
</script>
@stop