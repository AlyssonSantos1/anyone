<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if(isset($reviews) && !empty($reviews))
    @foreach($reviews as $review)
        <div class="project">
            <h3>{{ $review['project']->projectname }}</h3>
            <p><strong>Project Goals:</strong> {{ $review['project']->goals }}</p>
            <p><strong>Description:</strong> {{ $review['project']->description }}</p>

            {{-- Verifica se há avaliação do projeto --}}
            @if($review['projectReviews'])
                <h4>Project Review:</h4>
                <p>{{ $review['projectReviews'] }}</p>
            @else
                <p>No review available for this project.</p>
            @endif

            {{-- Verifica se há avaliações de membros e exibe --}}
            @if(count($review['membersReviews']) > 0)
                <h4>Member Reviews:</h4>
                @foreach($review['membersReviews'] as $memberReview)
                    {{-- Exibe avaliação do membro ou mensagem padrão se não houver avaliação --}}
                    <p>{{ $memberReview ?? 'No review available.' }}</p>
                @endforeach
            @else
                <p>No member reviews available.</p>
            @endif

            {{-- Exibe a avaliação pessoal do manager --}}
            @if(isset($review['personalReviews']))
                <h4>Your Personal Review:</h4>
                <p>{{ $review['personalReviews'] ?? 'No personal review available.' }}</p>
            @else
                <p>No personal review available.</p>
            @endif
        </div>
    @endforeach
@else
    <p>You are not associated with any projects or there are no reviews available.</p>
@endif
</form>

</body>
</html>