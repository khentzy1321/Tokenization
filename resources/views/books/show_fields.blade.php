<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $book->title }}</p>
</div>

<!-- Author Field -->
<div class="col-sm-12">
    {!! Form::label('author', 'Author:') !!}
    <p>{{ $book->author }}</p>
</div>

<!-- Publisher Field -->
<div class="col-sm-12">
    {!! Form::label('publisher', 'Publisher:') !!}
    <p>{{ $book->publisher }}</p>
</div>

<!-- Publish Date Field -->
<div class="col-sm-12">
    {!! Form::label('publish_date', 'Publish Date:') !!}
    <p>{{ $book->publish_date }}</p>
</div>

