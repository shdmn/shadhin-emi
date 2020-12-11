@extends('user_layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>EMI Details</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Serial no.</th>
                    <th>Title</th>
                    <th>Total Amount</th>
                    <th>Payment Date</th>
                    <th>Payment End Date</th>
                </tr>
            </thead>
            <tbody>
                @for($i=1;$i<=$apply->duration;$i++)
                <tr>
                    <td>{{ $i }}</td>
                    <td>Month {{ $i }}</td>
                    <td>{{ $apply->emi }}</td>
                    <td>
                        {{date('d-m-Y',strtotime('+'.($i).' months',strtotime(date($apply->created_at))))}}
                    </td>
                    <td>
                        {{date('d-m-Y',strtotime('+'.($i+1).' months',strtotime(date($apply->created_at))))}}
                    </td>
                    <td></td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <p><a href="{{ route('user.index') }}" class="btn btn-success" title="Back">Back</a></p>
    </div>
</div>
@endsection