<!-- Grid Header -->
<div class="row">
    <div class="col">
        <h3>Generated Formatted Decision Tree</h3>
    </div>
</div>
<!-- /.grid-header -->
<!-- Main Grid -->
<div class="row">
    <table class="tbl" cellspacing="0" cellpadding="0">
        <?php $count = 0 ?>
        @foreach($data->rows() as $r => $row )
        <tr>
            @foreach($row as $c => $cell)
            @if($c == 0)
            <td class="lbl">{{$cell}}</td>
            <td></td>
            @else
            <td>
                <input class="unchecked" type="button" value="{{$cell}}" id="{{$count += 1}}" onclick="checkButton('{{$count}}')">
            <td>
                @endif
                @endforeach
        </tr>
        <tr class="space">
            <td colspan="5">Space</td>
        </tr>
        @endforeach
    </table>
</div>
<!-- /.content -->