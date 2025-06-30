<div>

<div  {{$attributes->merge(['class'=> 'alert alert-'.$validType,'role'=>$attributes->prepends('alert') ]) }} >

@isset($title)

<h4 class="alert-heading">{{ $title }}</h4>
@else
<h4 class="alert-heading">Alert</h4>
@endisset


<hr>
{{ $slot }}
</div>

</div>