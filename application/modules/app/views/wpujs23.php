<div class='panel panel-default'>
    <!-- style="font-size:+1.6"	 -->
    <div class="panel-body">
        <div class='table-filter'>
            <div class='col-lg-12'>

            </div>
            <div class='clearfix'></div>
        </div>

        <div id="wrapper">
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <div class='panel panel-default'>
                        <div class='panel-body'>

                            abc

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function f0() {
        var i = 0;
        var str = '';
        for (i == 0; i < 5; i++) {
            str += '*';
        }
        console.log(str);
    }

    function f1() {
        var i = 0;
        var str = '';
        for (i == 0; i < 5; i++) {
            str += '*';
            str += '\n';
        }
        console.log(str);
    }

    function f2() {
        var i = 0;
        var str = '';
        str = '';
        for (i == 0; i < 5; i++) {
            str += '*';
            console.log(str);
        }
    }

    function f3() {
        var i = 0;
        var str = '';
        str = '';

        for (i = 5; i > 0; i--) {
            str += '*';
            console.log(str);
        }

    }


    $(document).ready(function() {
        $(document).find('#loading_panel_lite').hide();
        f1();
        console.log('\n');
        f2();
        console.log('\n');
        f3();
        console.log('\n');
        var i = 0;
        var j = 0;
        var str = '';
        str = '';

        for (i = 0; i < 7; i++) {
            for (j = 0; j < 3; j++) {
                str += '*';

            }
            str += '\n';

        }
        console.log(str);

    });
</script>