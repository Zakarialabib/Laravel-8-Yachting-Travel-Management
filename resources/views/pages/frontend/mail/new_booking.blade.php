@php
    $table_style = "style='width:100%;margin-left:auto;marrgin-right:auto;'";
    $font_size_14 = "style='font-size:14px'";
    $w100 = "style='width:100%'";
@endphp
<html>
<head>
    <title>{{__('Email new booking')}}</title>
</head>
<body>
<table {!! $table_style !!}>
    <tbody>
    <tr>
        <td align="center" {!! $font_size_14 !!}>
            <table {!! $w100 !!}>
                <tbody>
                <tr>
                    <td>
                        <p>{{__('Hello')}},</p>

                        <p>{{__('You have booking from website')}} {{setting('app_name')}}</p>

                        <p>{{__('Name')}}: {{$name}}</p>
                        <p>{{__('Email')}}: {{$email}}</p>
                        <p>{{__('Phone Number')}}: {{$phone}}</p>
                        <p>{{__('Place name')}}: {{$place}}</p>
                        <p>{{__('Datetime')}}: {{$datetime}}</p>
                        <p>{{__('Number of adult')}}: {{$numberofadult}}</p>
                        <p>{{__('Number of children')}}: {{$numberofchildren}}</p>
                        <p>{{__('Message')}}: {{$text_message}}</p>
                        <p>{{__('Booking at')}}: {{$booking_at}}</p>

                        <p>
                            <em>
                            {{__('Email from system')}},<br/>
                                {{setting('app_name')}}
                            </em>
                        </p>
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