@section('css')
<style>
    #star {
        text-align: center;
    }

    .checked {
        color: orange;
    }

    span.fa {
        font-size: 2.3rem;
    }

    h3 {
        font-family: "semibold";
        color: #000;
        text-align: center;
        margin: 2% 0;
    }

    p {
        font-family: "regular";
        font-size: 1.3rem;
        text-align: center;
        width: 70%;
        margin: 0 auto;
    }
</style>
@endsection
@extends("layouts.storeindex")
@section("content")
<!--begin::Card-->
<div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
            التقيم
        </div>
    </div>
    <div class="card-body">
        <div id="star"></div>
        <script>
            let x = "";
           
               let y = <?php echo $prorate->rate?>;
               console.log(y);
            for (let i = 1; i <= y; i++) {
                x += '<span class="fa fa-star checked"></span>';
            }
            document.getElementById("star").innerHTML = x;
        </script>
        <h3>{{$prorate->customer->rate ?? ''}} </h3>
        <p>   {{$prorate->review}}    </p>
    </div>
</div>
@endsection