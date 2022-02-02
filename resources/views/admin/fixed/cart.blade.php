<table class="table">
    <thead>
        <h1> my cart({{session()->has('cart') ? count(session()->get('cart')):0}})</h1>

      <tr>
        <th scope="col">#</th>
        <th scope="col">asset name</th>
     
        <th scope="col">quentity</th>
        <th scope="col">subtotal</th>
      </tr>
    </thead>
    <tbody>
         @if($carts)
    @foreach ($carts as $key=>$data )


      <tr>
        <th scope="row">{{$key}}</th>
        <td>{{$data['asset_name']}}</td>
 
        <td>{{$data['asset_qty']}}</td>
        
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
<a href="{{route('clear.cart')}}" class="btn btn-danger">Clear</a>
