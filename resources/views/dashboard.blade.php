@extends('layouts.dashboard')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6 col-md-12">
        <h5 class="m-0">Decision Tree Establishment</h5>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Main row -->

    <div class="row ml-0">
      <form action="{{ route('loadfile') }}" method="POST" enctype="multipart/form-data" style="width:100%">
        @csrf
        <label for="exampleInputFile">Upload SpreadSheet of Labels to Generate Decision Tree</label>
        <div class="row form-group">
          <div class="col-sm-12 col-md-8">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="exampleInputFile" name="file_sheet">
              <label class="custom-file-label" id="InputSheet">Choose file</label>
            </div>
            @if($errors->any())
            {{ implode('', $errors->all(':message')) }}
            @endif
          </div>
          <div class="col-sm-12 col-md-4">
            <input type="submit" class="btn btn-info float-right mr-3" name="submit" id="submit" value="Upload Sheet">
          </div>
        </div>
      </form>
    </div>

    <!-- Checking row -->
    <!-- <hr class="mt-0">
    <table class="table ">
      <tbody>
        <tr>
          <td class="">Label</td>
          <td class="text-center">
            <input class="unchecked" type="button" value="Button" id="1" onclick="checkButton('1')">
            <input class="unchecked" type="button" value="Button" id="2" onclick="checkButton('2')">
            <input class="unchecked" type="button" value="Button" id="3" onclick="checkButton('3')">
            <input class="unchecked" type="button" value="Button" id="1" onclick="checkButton('1')">
            <input class="unchecked" type="button" value="Button" id="2" onclick="checkButton('2')">
            <input class="unchecked" type="button" value="Button" id="3" onclick="checkButton('3')">
          </td>
          <td class="text-center">
            <input class="unchecked" type="button" value="Button" id="4" onclick="checkButton('4')">
            <input class="unchecked" type="button" value="Button" id="5" onclick="checkButton('5')">
            <input class="unchecked" type="button" value="Button" id="6" onclick="checkButton('6')">
            <input class="unchecked" type="button" value="Button" id="4" onclick="checkButton('4')">
            <input class="unchecked" type="button" value="Button" id="5" onclick="checkButton('5')">
            <input class="unchecked" type="button" value="Button" id="6" onclick="checkButton('6')">
          </td>
          <td class="text-center">
            <input class="unchecked" type="button" value="Button" id="7" onclick="checkButton('7')">
            <input class="unchecked" type="button" value="Button" id="8" onclick="checkButton('8')">
            <input class="unchecked" type="button" value="Button" id="9" onclick="checkButton('9')">
            <input class="unchecked" type="button" value="Button" id="7" onclick="checkButton('7')">
            <input class="unchecked" type="button" value="Button" id="8" onclick="checkButton('8')">
            <input class="unchecked" type="button" value="Button" id="9" onclick="checkButton('9')">
          </td>
        </tr>
        <tr>
          <td class="">Label</td>
          <td class="text-center">
            <input class="unchecked" type="button" value="Button" id="1" onclick="checkButton('1')">
            <input class="unchecked" type="button" value="Button" id="2" onclick="checkButton('2')">
            <input class="unchecked" type="button" value="Button" id="3" onclick="checkButton('3')">
            <input class="unchecked" type="button" value="Button" id="1" onclick="checkButton('1')">
            <input class="unchecked" type="button" value="Button" id="2" onclick="checkButton('2')">
            <input class="unchecked" type="button" value="Button" id="3" onclick="checkButton('3')">
          </td>
          <td class="text-center">
            <input class="unchecked" type="button" value="Button" id="4" onclick="checkButton('4')">
            <input class="unchecked" type="button" value="Button" id="5" onclick="checkButton('5')">
            <input class="unchecked" type="button" value="Button" id="6" onclick="checkButton('6')">
            <input class="unchecked" type="button" value="Button" id="4" onclick="checkButton('4')">
            <input class="unchecked" type="button" value="Button" id="5" onclick="checkButton('5')">
            <input class="unchecked" type="button" value="Button" id="6" onclick="checkButton('6')">
          </td>
          <td class="text-center">
            <input class="unchecked" type="button" value="Button" id="7" onclick="checkButton('7')">
            <input class="unchecked" type="button" value="Button" id="8" onclick="checkButton('8')">
            <input class="unchecked" type="button" value="Button" id="9" onclick="checkButton('9')">
            <input class="unchecked" type="button" value="Button" id="7" onclick="checkButton('7')">
            <input class="unchecked" type="button" value="Button" id="8" onclick="checkButton('8')">
            <input class="unchecked" type="button" value="Button" id="9" onclick="checkButton('9')">
          </td>
        </tr>
        <tr>
          <td class="">Label</td>
          <td class="text-center">
            <input class="unchecked" type="button" value="Button" id="1" onclick="checkButton('1')">
            <input class="unchecked" type="button" value="Button" id="2" onclick="checkButton('2')">
            <input class="unchecked" type="button" value="Button" id="3" onclick="checkButton('3')">
            <input class="unchecked" type="button" value="Button" id="1" onclick="checkButton('1')">
            <input class="unchecked" type="button" value="Button" id="2" onclick="checkButton('2')">
            <input class="unchecked" type="button" value="Button" id="3" onclick="checkButton('3')">
          </td>
          <td class="text-center">
            <input class="unchecked" type="button" value="Button" id="4" onclick="checkButton('4')">
            <input class="unchecked" type="button" value="Button" id="5" onclick="checkButton('5')">
            <input class="unchecked" type="button" value="Button" id="6" onclick="checkButton('6')">
            <input class="unchecked" type="button" value="Button" id="4" onclick="checkButton('4')">
            <input class="unchecked" type="button" value="Button" id="5" onclick="checkButton('5')">
            <input class="unchecked" type="button" value="Button" id="6" onclick="checkButton('6')">
          </td>
          <td class="text-center">
            <input class="unchecked" type="button" value="Button" id="7" onclick="checkButton('7')">
            <input class="unchecked" type="button" value="Button" id="8" onclick="checkButton('8')">
            <input class="unchecked" type="button" value="Button" id="9" onclick="checkButton('9')">
            <input class="unchecked" type="button" value="Button" id="7" onclick="checkButton('7')">
            <input class="unchecked" type="button" value="Button" id="8" onclick="checkButton('8')">
            <input class="unchecked" type="button" value="Button" id="9" onclick="checkButton('9')">
          </td>
        </tr>
        <tr>
          <td class="">Label</td>
          <td class="text-center">
            <input class="unchecked" type="button" value="Button" id="1" onclick="checkButton('1')">
            <input class="unchecked" type="button" value="Button" id="2" onclick="checkButton('2')">
            <input class="unchecked" type="button" value="Button" id="3" onclick="checkButton('3')">
            <input class="unchecked" type="button" value="Button" id="1" onclick="checkButton('1')">
            <input class="unchecked" type="button" value="Button" id="2" onclick="checkButton('2')">
            <input class="unchecked" type="button" value="Button" id="3" onclick="checkButton('3')">
          </td>
          <td class="text-center">
            <input class="unchecked" type="button" value="Button" id="4" onclick="checkButton('4')">
            <input class="unchecked" type="button" value="Button" id="5" onclick="checkButton('5')">
            <input class="unchecked" type="button" value="Button" id="6" onclick="checkButton('6')">
            <input class="unchecked" type="button" value="Button" id="4" onclick="checkButton('4')">
            <input class="unchecked" type="button" value="Button" id="5" onclick="checkButton('5')">
            <input class="unchecked" type="button" value="Button" id="6" onclick="checkButton('6')">
          </td>
          <td class="text-center">
            <input class="unchecked" type="button" value="Button" id="7" onclick="checkButton('7')">
            <input class="unchecked" type="button" value="Button" id="8" onclick="checkButton('8')">
            <input class="unchecked" type="button" value="Button" id="9" onclick="checkButton('9')">
            <input class="unchecked" type="button" value="Button" id="7" onclick="checkButton('7')">
            <input class="unchecked" type="button" value="Button" id="8" onclick="checkButton('8')">
            <input class="unchecked" type="button" value="Button" id="9" onclick="checkButton('9')">
          </td>
        </tr>
      </tbody>
    </table> -->

    <hr class="mt-0">
    @if($data != null)
    <!-- Grid Header -->
    <div class="row">
      <div class="col">
        <h3>Generated Formatted Decision Tree</h3>
      </div>
    </div>
    <!-- /.grid-header -->
    <!-- Main Grid -->
    <!-- <div class="row float-left" style="width:100%"> -->
    <table class="table " cellspacing="0" cellpadding="0">
      <?php $count = 0 ?>
      <tr class="text-center">
        <th class="text-left">Label Description</th>
        <th>Section 1</th>
        <th>Section 2</th>
        <th>Section 3</th>
      </tr>
      @foreach($data as $r => $row )
      <tr>
        @foreach($row as $c => $col)
          @if($col instanceof stdClass)
            <td class="text-center">
              @foreach($col as $btn)
                <input class="unchecked {{$c}}" type="button" value="{{$btn}} {{$count}}" id="{{$count += 1}}" onclick="checkButton('{{$count}}')">
              @endforeach
            </td>
          @elseif(is_string($col))
            <td class="text-left">{{$col}}</td>
          @endif
        @endforeach
      </tr>
      @endforeach

      <tr class="mt-5 mb-5">
        <td>JSON String</td>
        <td colspan=3>
          <input class="form-control" type="input" name="JSON-string" id="JSON-string" value="JSON String to be Exported" placeholder="JSON String of selected buttons">
        </td>
      </tr>

      <tr class="pt-10 pb-10">
        <td>Logic</td>
        <td><button class="btn btn-secondary btn-block" id="sec1-logic">Section 1 Decision Tree</button></td>
        <td><button class="btn btn-secondary btn-block" id="sec2-logic">Section 2 Decision Tree</button></td>
        <td><button class="btn btn-secondary btn-block" id="sec3-logic">Section 3 Decision Tree</button></td>
      </tr>

      <tr class="mt-5 mb-5">
        <td>Description Bucket</td>
        <td>
          <input class="form-control" type="input" name="desc-bucket-tree1" id="desc-bucket-tree1" value="" placeholder="Description for T1">
        </td>
        <td>
          <input class="form-control" type="input" name="desc-bucket-tree2" id="desc-bucket-tree2" value="" placeholder="Description for T2">
        </td>
        <td>
          <input class="form-control" type="input" name="desc-bucket-tree3" id="desc-bucket-tree3" value="" placeholder="Description for T3">
        </td>
      </tr>

      <tr class="mt-5 mb-5">
        <td>Description Bucket</td>
        <td>
          <input class="form-control" type="input" name="desp-bucket-tree1" id="desp-bucket-tree1" value="" placeholder="Desposition for T1">
        </td>
        <td>
          <input class="form-control" type="input" name="desp-bucket-tree2" id="desp-bucket-tree2" value="" placeholder="Desposition for T2">
        </td>
        <td>
          <input class="form-control" type="input" name="desp-bucket-tree3" id="desp-bucket-tree3" value="" placeholder="Desposition for T3">
        </td>
      </tr>

    </table>

    <div class="row pt-4 pb-4">
      <div class="col-4 offset-8 pr-3">
        <div class="btn btn-success btn-block"><i class="fa fa-download fa-lg mr-2"></i><b>Export JSON<b></div>
      </div>
    </div>
    <!-- </div> -->
    <!-- /.content -->
    @endif
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection