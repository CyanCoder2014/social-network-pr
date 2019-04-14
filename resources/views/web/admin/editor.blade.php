@extends('layouts.admin')

@section('admin_content')



    <!--PAGE CONTENT -->
    <div id="content">


        <div class="inner" style="min-height: 700px;">
            <div class="row">


                <div class="col-lg-12">
                    <h1> ثبت مطلب </h1>
                </div>
                <hr>



                <script src="<?= Url('assets/admin/plugins/ckeditorp/ckeditor.js'); ?>"></script>

                <form>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>
                    <script>
                        // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace( 'editor1' );
                    </script>
                </form>




            </div>
            <!--TABLE, PANEL, ACCORDION AND MODAL  -->


        </div>

    </div>
    <!--END PAGE CONTENT -->

    <!-- RIGHT STRIP  SECTION -->




    <!--END MAIN WRAPPER -->


@endsection