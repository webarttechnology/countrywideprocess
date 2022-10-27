<!DOCTYPE html>
<html>
<head>
    <title>Assisted eRecording</title>
</head>
<body>
<div style="width: 600px; margin: 0 auto; height: 200px;">
        <h1 style="text-align: center; color: #0c52bb; text-transform: uppercase;">Assisted eRecording</h1>

        <h3 style="text-align: center;color: #fff;background: #158cd5;padding: 6px;margin-bottom: 0;border-radius: 3px 3px 0 0;">Basic Information</h3>
        <div style="background: #f3f3f3;padding: 15px;border-radius: 0 0 3px 3px;">
            <ul style="margin: 0;padding: 0;">
                <li style="list-style: none;padding: 5px 0;"><div style="width: 22%;display: inline-block;font-weight: bold;">State :</div>{{$pdfdata ->state_name}} </li>
                <li style="list-style: none;padding: 5px 0;"><div style="width: 22%;display: inline-block;font-weight: bold;">County :</div> {{$pdfdata ->county}}</li>
                <li style="list-style: none;padding: 5px 0;"><div style="width: 22%;display: inline-block;font-weight: bold;">Document Type :</div>  {{$pdfdata ->document_type}}</li>
                <li style="list-style: none;padding: 5px 0;"><div style="width: 22%;display: inline-block;font-weight: bold;">Payment Status :</div> <span><span class="badge badge-{{$pdfdata->payment_status == 1?'success':'danger'}} m-b-5">{{$pdfdata->payment_status == 1?"Paid":"Unpaid"}}</span></li>
                @if($pdfdata->payment_status == 1)
                <li style="list-style: none;padding: 5px 0;"><div style="width: 22%;display: inline-block;font-weight: bold;">Payment Amt :</div>  {{$pdfdata ->payment_amt}}</li>
                @endif
            </ul>
        </div>

        @if($pdfdata->state_name == "New York")

        <h3 style="text-align: center;color: #fff;background: #158cd5;padding: 6px;margin-bottom: 0;border-radius: 3px 3px 0 0;">Legal Descriptions</h3>
        <div style="background: #f3f3f3;padding: 15px;border-radius: 0 0 3px 3px;">
            <ul style="margin: 0;padding: 0;">
                <li style="list-style: none;padding: 5px 0;"><div style="width: 22%;display: inline-block;font-weight: bold;">Section :</div>{{$pdfdata ->section}} </li>
                <li style="list-style: none;padding: 5px 0;"><div style="width: 22%;display: inline-block;font-weight: bold;">Block :</div> {{$pdfdata ->block}}</li>
                <li style="list-style: none;padding: 5px 0;"><div style="width: 22%;display: inline-block;font-weight: bold;">Lot :</div>  {{$pdfdata ->lot}}</li>
                <li style="list-style: none;padding: 5px 0;"><div style="width: 22%;display: inline-block;font-weight: bold;">Unit :</div> {{$pdfdata ->unit}} </li>
                <li style="list-style: none;padding: 5px 0;"><div style="width: 22%;display: inline-block;font-weight: bold;">Town  :</div>  {{$pdfdata ->town}}</li>
            </ul>
        </div>

        @endif

        <h3 style="text-align: center;color: #fff;background: #158cd5;padding: 6px;margin-bottom: 0;border-radius: 3px 3px 0 0;">Grantor Information</h3>
        <div style="background: #f3f3f3;padding: 15px;border-radius: 0 0 3px 3px;">
            <ul style="margin: 0;padding: 0;">
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">Suffix :</div> {{$pdfdata ->suffix}}</li>
                @if($pdfdata ->inlineRadio2 == "true")
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">Organization Name :</div> {{$pdfdata ->organization_name}}</li>
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">Authorized Agent Name :</div> {{$pdfdata ->authorized_agent_name}}</li>
                @endif
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">First Name :</div> <span>{{$pdfdata ->first_name}}</span></li>
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">Last Name :</div> <span>{{$pdfdata ->last_name }}</span></li>
            </ul>
        </div>

        <h3 style="text-align: center;color: #fff;background: #158cd5;padding: 6px;margin-bottom: 0;border-radius: 3px 3px 0 0;">Grantee Information</h3>
        <div style="background: #f3f3f3;padding: 15px;border-radius: 0 0 3px 3px;">
            <ul style="margin: 0;padding: 0;">
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">Suffix :</div> {{$pdfdata ->suffix}}</li>
                @if($pdfdata ->grantee_inlineRadio2 == "true")
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">Organization Name :</div> {{$pdfdata ->grantee_organization_name}}</li>
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">Authorized Agent Name :</div> {{$pdfdata ->grantee_authorized_agent_name}}</li>
                @endif
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">First Name :</div> <span>{{$pdfdata ->grantee_first_name}}</span></li>
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">Last Name :</div> <span>{{$pdfdata ->grantee_last_name }}</span></li>
            </ul>
        </div>

        <h3 style="text-align: center;color: #fff;background: #158cd5;padding: 6px;margin-bottom: 0;border-radius: 3px 3px 0 0;">Property Taxation Info</h3>
        <div style="background: #f3f3f3;padding: 15px;border-radius: 0 0 3px 3px;">
            <ul style="margin: 0;padding: 0;">
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">Transfer Tax Exempt :</div> {{ $pdfdata->transfer_tax_exempt1 == "true"?"Yes":"No" }}</li>
                @if($pdfdata ->inlineRadio2 == "true")
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">Consideration Amount in :</div> {{$pdfdata ->consideration_amount}}</li>
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">Party Count:</div> {{$pdfdata ->party_count}}</li>
                @endif
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">Transfer Tax($) :</div> <span>{{$pdfdata ->transfer_tax}}</span></li>
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">Title Count :</div> <span>{{$pdfdata ->title_count }}</span></li>
                <li style="list-style: none;padding: 5px 0;"><div style="width: 34%;display: inline-block;font-weight: bold;">SB2 Fee Exempt  :</div> <span>{{ $pdfdata ->sb2 == "true"?"True":"False"}}</span></li>
            </ul>
        </div>
    </div>
</body>
</html>