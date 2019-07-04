<?php $i=1; ?>
@foreach($borrowers as $borrower)

<table >
	<tr>
		<td>SN</td>
		<td>Borrower Name</td>


	</tr>
	<tr>
		<td>{{$i++}}</td>
		<td>{{$borrower->fname.' '.$borrower->lname}}</td>
	</tr>
	
</table>
@endforeach