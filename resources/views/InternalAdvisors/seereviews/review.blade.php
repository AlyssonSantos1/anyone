{{-- resources/views/InternalAdvisors/seereviews/review.blade.php --}}

@if(isset($error))
    <p class="alert">{{ $error }}</p>
@else
    <div class="review-content">
        <h3>Review for {{ $project->projectname }}:</h3>
        <p>{{ $review }}</p>
    </div>
@endif
