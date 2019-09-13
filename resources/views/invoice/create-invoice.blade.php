<?php
//dd($services)
?>
@extends('layouts.common1')

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
                                                <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                                                <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="invoice overflow-auto">
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
                                                            <div class="email"><a href="mailto:{{$appointment[0]["customer"]["email"]}}">{{$appointment[0]["customer"]["email"]}}</a></div>
                                                        </div>
                                                        <div class="col invoice-details">
                                                            <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                                            <div class="date">Date of Invoice: {{date('Y-m-d')}}</div>

                                                        </div>
                                                    </div>
                                                    <table border="0" cellspacing="0" cellpadding="0">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>

                                                            <th class="text-right">SERVICE</th>

                                                            <th class="text-right">TOTAL</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @php
                                                        $services=explode(',',$appointment[0]["services"]);
                                                        @endphp

                                                        <tr>
                                                            <td class="no">04</td>
                                                            <td class="text-left"><h3>
                                                                    <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                                                        Youtube channel
                                                                    </a>
                                                                </h3>
                                                                <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">
                                                                    Useful videos
                                                                </a>
                                                                to improve your Javascript skills. Subscribe and stay tuned :)
                                                            </td>
                                                            <td class="unit">$0.00</td>
                                                            <td class="qty">100</td>
                                                            <td class="total">$0.00</td>
                                                        </tr>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">SUBTOTAL</td>
                                                            <td>$5,200.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">TAX 25%</td>
                                                            <td>$1,300.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">GRAND TOTAL</td>
                                                            <td>$6,500.00</td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                    <div class="thanks">Thank you!</div>
                                                    <div class="notices">
                                                        <div>NOTICE:</div>
                                                        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
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
