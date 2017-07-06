@extends('layouts.main')
@section('content')
    <style>
        div.panel-footer {
            height: 70px;
        }

        ul.pagination {
            margin: 0px;
        }
    </style>
    <div class="col-xs-10 col-sm-10 col-md-11">
        <div class="panel panel-default">
            <div class="panel-heading">@lang(Request::get('module').".lbl_list_title")</div>
            <div class="panel-body">
                @if( count($data) > 0 && count($data[0]->getListConfig()) > 0)
                    <table class="table table-striped table-hover table-condensed table-responsive">
                        <thead>
                        <tr>
                            <?php $config = $data[0]->getListConfig() ?>
                            @foreach($config as $conf)
                                <th>@lang($conf['label'])</th>
                            @endforeach
                            <th class="text-right">@lang('global.lbl_list_operation')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $subData)
                            <tr>
                                @foreach($config as $conf)
                                    @if($conf['type'] == 'varchar')
                                        <td>{{ $subData[$conf['field']] }}</td>
                                    @elseif($conf['type'] == 'options')
                                    <td>{{ trans($conf['options_list'])[$subData[$conf['field']]] }}</td>
                                    @endif
                                @endforeach
                                <td class="text-right">
                                    <a href="#" data-toggle="tooltip" data-placement="left"
                                       title="@lang('global.tip_edit')">
                                        <span class="glyphicon glyphicon-pencil"></span></a>
                                    &nbsp;
                                    <a href="#" data-toggle="tooltip" data-placement="right"
                                       title="@lang('global.tip_detail')">
                                        <span class="glyphicon glyphicon-file"></span></a>
                                    &nbsp;
                                    <a href="#" data-toggle="tooltip" data-placement="right"
                                       title="@lang('global.tip_delete')">
                                        <span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
            <div class="panel-footer">
                @if(count($data) > 0)
                    <div class="text-right">{{ $data->links() }}</div>
                @endif
            </div>
        </div>
    </div>
    <script language="JavaScript">
        function edit_record(id) {

        }
        function detail_record(id) {

        }
        function delete_record(id) {

        }
    </script>
@endsection