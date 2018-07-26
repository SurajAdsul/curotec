<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel DataTables Editor</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.4/css/select.bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/editor/css/dataTables.editor.css">
    <link rel="stylesheet" href="/plugins/editor/css/editor.bootstrap.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.4/js/dataTables.select.min.js"></script>
    <script src="{{asset('plugins/editor/js/dataTables.editor.js')}}"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.bootstrap.min.js"></script>

    <script src="{{asset('plugins/editor/js/editor.bootstrap.min.js')}}"></script>
</head>
<body>
    <div class="container">
        {{$dataTable->table(['id' => 'surveys'])}}

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
    </div>
  </div>
</div>
    </div>

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });

            $.fn.dataTable.ext.buttons.custom = {
                className: 'custom-button',

                text: function (dt) {
                    return '<i class="fa fa-file-excel-o"></i> ' + dt.i18n('buttons.custom', 'Assign Users');
                },

                action: function (e, dt, button, config) {
                    window.location = "/create";
                }
            };

            var editor = new $.fn.dataTable.Editor({
                ajax: "/surveys",
                table: "#surveys",
                display: "bootstrap",
                fields: [
                {label: "Name:", name: "name"},
                ]
            });

            $('#surveys').on('click', 'tbody td:not(:first-child)', function (e) {
                editor.inline(this);
            });

            {{$dataTable->generateScripts()}}
        })
    </script>
</body>
</html>