@extends('layouts.app')

@section('content')
    <h1 class="pl-4 pt-5">{{$ads->brand_id}}</h1>

     <div class="col-6">
       <img src="/storage/images/{!!$ads->image!!}" class="w-100">
       <br><br>
       <font size="4">
       <table style="width:100%" class="align-items-baseline">
        <tr>
          <th>SKU:</th>
          <td>{!!$ads->fuel!!}</td>
        </tr>
        <tr>
          <th>Tax rate:</th>
          <td>{!!$ads->gearbox!!} %</td>
        </tr>
          <tr>
            <th>Price:</th>
            <td>{!!round($ads->price, 2)!!} €</td>
          </tr>
        <tr>
          <th>Description:</th>
          <td>{!!$ads->description!!}</td>
        </tr>
      </table>
     </div>
     <br><br><br>


     <!--
     show all product reviews
     !-->
     <!--
     @if(count($reviews) > 0)
       <h3 class="pt-5">Reviews ({{$count}})</h3>
         @foreach($reviews as $review)
            @if($review->product_id == $product->id)
               <div class="card card-body bg-light">
                 <h3>
                   {!!$review->body!!}
                 </h3>
                 <h3>
                   {!!$review->rating!!}
                 </h3>
               </div>
               <br>
             @endif
         @endforeach
         {{$reviews->links()}}
       @else
         <h3 class="pl-4 pt-5">No reviews yet</h3>

     @endif
     !-->

     <!--
     Add product review
     !-->

     <h1 class="pl-4 pt-5">Add your review</h1>
     {!! Form::open(['action' => 'ReviewsController@store', 'method' => 'POST']) !!}

         <div class="form-group">
             {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'required'])}}
         </div>
         {!! Form::hidden('productid',  $ads->id) !!}
         {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
     {!! Form::close() !!}

@endsection
