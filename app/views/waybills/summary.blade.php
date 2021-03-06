
<style>
    table,th,td
    {
        border:1px solid black;
        border-collapse:collapse;
	font-size: 11px;
    }
    table
    {
	width: 100%;
    }		

</style>

<center>{{HTML::image('assets/img/logo.jpg')}}</center>

<br/>

<table>
    <tr>
        <td colspan="11">
    <center>DAR ES SALAAM VODACOM DELIVERY SHEET FOR THE PERIOD OF 1 st-15th JULY 2014</center>
</td>
</tr>
<tr>
    <td>Sr #</td>
    <td>Cluster</td>
    <td>VENDOR</td>
    <td>ITEM</td>
    <td>WAYBILL/ORDER</td>
    <td>RECEIVER</td>
    <td>TIME</td>
    <td>DATE</td>
    <td>RATE</td>
    <td>WEIGHT</td>
    <td>AMOUNT</td>
</tr>
<?php $i = 1; ?>
@foreach($waybs as $d)
<tr>
    <td>{{$i}}<?php $i++; ?></td>
    <td>{{Address::where('id', $d->address_sender)->first()->name}}</td>
    <td>{{Address::where('id', $d->address_receiver)->first()->name}}</td>
    <td>
	<?php
 
	if(Item::where('waybill_id', $d->id)->count() == 0){
		 echo 0;		
	}else{
		 echo Item::where('waybill_id', $d->id)->first()->description; 
	}

	?>    
    </td>
    <td>{{$d->code}}/{{WO::where('waybill_id', $d->code)}}</td>
    <td>{{$d->receiver_name}}</td>
    <td>{{date_format(date_create($d->date_delivery), 'H:i:s')}}</td>
    <td>{{date_format(date_create($d->date_delivery), 'Y-m-d')}}</td>
    <td>
{{
(Tarrif::whereRaw("origin = ? and destination = ? and units = ?", array($d->origin, $d->destination, Tarrif::getUnits(Item::where('waybill_id', $d->id)->first()->weight)))->first()->cost)

}}</td>
    <td>
	<?php
 
	if(Item::where('waybill_id', $d->id)->count() == 0){
		 echo 0;		
	}else{
		 echo Item::where('waybill_id', $d->id)->first()->weight; 
	}

	?>
	
   </td>
    <td>
{{
(Tarrif::whereRaw("origin = ? and destination = ? and units = ?", array($d->origin, $d->destination, Tarrif::getUnits(Item::where('waybill_id', $d->id)->first()->weight)))->first()->cost)

*(Item::where('waybill_id', $d->id)->first()->weight)}}
    </td>
</tr>   
@endforeach
</table>
