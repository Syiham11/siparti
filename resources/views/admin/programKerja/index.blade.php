@extends('admin.layouts.base')

@section('content')

    <div class="ui container">
        <section class="section-audit-trails">

            <div class="ui menu top attached">
                <div class="item borderless">
                    <h4>Program Kerja</h4>
                </div>
                <div class="right menu">
                    <div class="ui right aligned item">
                        <form method="GET" action="{{ route('admin.programKerja.index') }}">
                            <div class="ui transparent icon input">
                                <input class="prompt" name="search" value="{{ request('search') }}" type="text" placeholder="Cari...">
                                <i class="search link icon"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @if(!$programKerja->isEmpty())
                <div class="ui menu attached">
                    <div class="item borderless">
                        <a href="{{ route('admin.programKerja.create') }}" class="ui button"><i class="icon plus"></i> Tambah</a>
                    </div>
                    <div class="item borderless">
                        <form role="form" data-type="delete-multiple" action="{{ route('admin.programKerja.destroy', ':ids') }}" method="POST" onsubmit="return confirm('Anda yakin?')">
                            <input type="hidden" name="_method" value="DELETE">
                            {{ csrf_field() }}
                            <button type="submit" class="ui button disabled">Hapus Terpilih</button>
                        </form>
                    </div>
                    <div class="menu right">
                        <div class="item borderless">
                            <small>{!! with(new \Laravolt\Support\Pagination\SemanticUiPagination($programKerja))->summary() !!}</small>
                        </div>
                    </div>
                </div>
            @endif

            <div class="ui segment attached fitted">
                <table class="ui very compact table bottom small">
                    <thead>
                    <tr>
                        <th width="50px">
                            <div class="ui checkbox" data-toggle="checkall" data-selector=".checkbox[data-type='check-all-child']">
                                <input type="checkbox">
                            </div>
                        </th>
                        <th>Nama</th>
                        <th>Fase Sekarang</th>
                        <th>Satker</th>
                        <th>Ditambahkan Oleh</th>
                        <th>Ditambahkan Pada</th>


                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody class="collection">
                    @forelse($programKerja as $data)
                        <tr>
                            <td>
                                <div class="ui checkbox" data-type="check-all-child">
                                    <input type="checkbox" name="ids[]" value="{{ $data->id }}">
                                </div>
                            </td>
                            <td>{{ $data->present('name') }}</td>
                            <td>{!! $data->present('fase_sekarang') !!}</td>
                            <td>{{ $data->present('satker_name') }}</td>
                            <td>{{ $data->present('creator_name') }}</td>
                            <td>{{ $data->present('date_for_human') }}</td>

                            <td class="right aligned">
                                <div class="ui icon buttons mini basic">
                                    <a class="ui button" href="{{ Route('admin.programKerja.edit', ['id' => $data->present('id')]) }}"><i class="edit icon"></i></a>

                                    <form role="form" action="{{ route('admin.programKerja.destroy',  $data->id) }}" method="POST" onsubmit="return confirm('Anda yakin?')">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <button type="submit" class="ui button"><i class="delete icon"></i></button>
                                    </form>
                                </div>
                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="7" class="warning center aligned" style="font-size: 1.5rem;padding:40px;font-style: italic">Data tidak tersedia</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="ui menu bottom attached">
                <div class="item borderless">
                    <small>{!! with(new \Laravolt\Support\Pagination\SemanticUiPagination($programKerja))->pager() !!}</small>
                </div>
                @if(!$programKerja->isEmpty())
                    {!! with(new \Laravolt\Support\Pagination\SemanticUiPagination($programKerja))->render('attached bottom right') !!}
                @endif
            </div>
        </section>
    </div>
@endsection
