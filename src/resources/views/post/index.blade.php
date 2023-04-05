@extends('layouts.app')

@section('content')
<div class="container">
  <p class="fw-bold fs-2">投稿一覧</p>
  {{-- 投稿分だけ繰り返す --}}
  @foreach($post as $p)
   <div class="card border p-2 mb-2 shadow-sm">
    <div class="row">
      <div class="col-2">
        <a href="{{route('post.show',['id' => $p->id])}}">
          <img src="../../uploads/{{$p->image}}"alt="" style="max-height: 150px; width: 100%">
        </a>
      </div>
      <div class="col-10">
        <a href="{{route('post.show',['id' => $p->id])}}" class="fs-3">{{$p->title}}</a>
        <div class="row">
          <div>詳細：{{$p->description}}</div>
          <div>投稿者：{{$p->name}}</div> 
        </div>
      </div>
    </div>

    </div>


  @endforeach
</div>
@endsection

<script>
  function delete_alert(e){
   if(!window.confirm('本当に削除しますか？')){
      window.alert('キャンセルされました'); 
      return false;
   }
   document.deleteform.submit();
  };
</script>