<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
    اپلود</button>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" style="width: 100%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">اپلود عکس</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <div id="upload-demo" style="width:350px"></div>
                    </div>
                    <div class="col-md-2" style="padding-top:30px;">
                        <strong>Select Image:</strong>
                        <br/>
                        <input type="file" id="upload">
                        <br/>
                        <div>
                            <label>دارای لوگو باشد؟</label>
                            <input type="checkbox" id="haslogo" >
                        </div>
                        <button class="btn btn-success upload-result" type="button">اپلود</button>
                    </div>


                    <div class="col-md-4" style="">
                        <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                <button id="save" type="button" class="btn btn-primary" data-dismiss="modal">ذخیره</button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('prismetric/image-uploader/croppie.js')}}"></script>
<link rel="stylesheet" href="{{asset('prismetric/image-uploader/croppie.css')}}">

<script type="text/javascript">


    var link= "";


    $uploadCrop = $('#upload-demo').croppie({
        viewport: { width: 500, height: 350 },
        boundary: { width: 500, height: 500 },
        showZoomer: false,
        enableOrientation: true
    });


    $('#upload').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
    });


    $('.upload-result').on('click', function (ev) {

        var logo = 0;
        if($("#haslogo").prop('checked') == true)
            logo=1;

        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {
            $.ajax({
                url: "{{route('upload.image')}}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                data: {"image":resp,
                    "logo":logo,
                },
                dataType: "json",
                success: function (data) {
                    html = '<img src="' + data + '" style="max-width: 250px;max-height: 250px"/>';
                    $("#upload-demo-i").html(html);
                    link=data;
                }
            });
        });
    });

    $('#save').on('click', function (ev) {
        $('#Image').val(link);
        $('#holder').attr('src',link);

    });


</script>