
<x-header-component />

 @foreach($blog as $key =>  $value)
   
    @if($value['slug_value'] == $slug_name)

    <section class="minbody">
     <div class="efilingpg blogdtlspg">
         
        <div class="pgmincontent pt-4">
         <div class="cmpnyimage wow fadeInDown" data-wow-delay=".10s"><img src="{{ asset($value->image) }}"></div>
             <div class="container">
                 <div class="row justify-content-end">
                     <div class="col-md-6">
                         <div class="contentbox wow bounceInDown" data-wow-delay=".6s">
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb">
                                     <li class="breadcrumb-item"><a href="{{ URL::to('/') }}" class="text-secondary"><img src="{{asset('/design/images/logo-icon.png')}}" width="40px"> Countrywide Process</a></li>
                                     <li class="breadcrumb-item"><a href="{{ URL::to('/blog') }}" class="text-secondary">Blog</a></li>
                                     <li class="breadcrumb-item fw-bold" style="color:blue">{{ $value->name }}</li>
                                 </ol>
                             </nav>
                             <h1 class="d-inline-block display-5 fw-bold mt-3 py-2 mb-3 ">{{ $value->name }}</h1>
                            
                             <?= htmlspecialchars_decode($value->details) ?>
                                    <h4 class="mb-3 text-theme">Download PDF</h4>
                             
                                @foreach($pdf as $doc)
                                    @if($doc ->blog_id == $value->id)     
                                        <a href="{{ asset($doc->pdf_link) }}"  target="_blank" class="border d-inline-block fs-6 fw-bolder p-2 rounded-3 shadow text-center text-black"><i class="fa fa-file-pdf-o fs-2 text-danger"></i><br/> {{$value->name}}</a>
                                    @else
                                            {{ " " }}
                                @endif
                                @endforeach

                         </div>
                     </div>
                 </div>
             </div>
         </div>
         
     </div>
 </section>

@if($key != 0)
<div class="content-main-arrow left ng-scope" >
 <a class="content-arrow-trigger" href="{{ URL::to('blog/'.$blog[$key -1]->slug_value) }}">
     <div class="info-wrapper">
         <div  class="thumb ng-isolate-scope" style="background-image: url({{ asset($blog[$key-1] -> image) }}); background-size: cover; background-repeat: no-repeat; background-position: 57% 48%;"></div>
         <strong>Previous</strong>
         <span class="ng-binding">{{ $blog[$key -1] -> name }}</span>
     </div>
     <div class="pointer"></div>
 </a>
</div>
@endif

@if($key < $max_length-1)
<div class="content-main-arrow right ng-scope">
 <a class="content-arrow-trigger"  href="{{ url('blog/'. $blog[$key+1] -> slug_value)}}">
     <div class="info-wrapper">
         <div class="thumb ng-isolate-scope" style="background-image: url({{asset($blog[$key+1] -> image)}}); background-size: cover; background-repeat: no-repeat; background-position: 50% 50%;"></div>
         <strong>Next</strong>
         <span class="ng-binding">{{ $blog[$key+1] -> name }}</span>
     </div>
     <div class="pointer"></div>
 </a>
</div>
@endif
@endif
 @endforeach
<x-footer-component />