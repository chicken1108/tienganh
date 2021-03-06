@extends('admin.pages.master')
@section('title','Danh sách bài thi')
@section('main')
<div id="main-content-wp" class="list-post-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="{{ route('test.create') }}" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Danh sách bài thi</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        @include('admin.pages.sidebar')
        <div id="content" class="fl-right">                       
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <div class="filter-wp clearfix">
                    <div class="table-responsive">
                        @include('errors.note')
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Tên</span></td>
                                    <td><span class="thead-text">Chức năng</span></td>
                                    <td><span class="thead-text">Mô tả</span></td>
                                    <td><span class="thead-text">Số câu</span></td>
                                    <td><span class="thead-text">Thời gian </span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @foreach($list_test as $lt)
                                <?php $i++; ?>
                                <tr>
                                    <td><span class="tbody-text">{{$i}}</h3></span>
                                    <td class="clearfix">
                                        <div class="tb-title fl-left">
                                            <a href="" title="">{{$lt->test_name}}</a>
                                        </div>
                                     </td>
                                      <td>
                                        <div>
                                            <form action="{{ route('test.edit',['test'=>$lt->test_id]) }}" method="GET">
                                                    <input type="submit" value="Sửa">
                                                </form>
                                        </div>
                                        <div>
                                             <form action="{{ route('test.destroy',['test'=>$lt->test_id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" value="Xoá" onclick="return confirm('Bạn có chắc muốn xoá?');">
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="tb-title fl-left">
                                            <a href="" title="">{{$lt->test_description}}</a>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>{{ $lt->test_total_questions }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <p>{{ $lt->test_times }}</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail clearfix">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection