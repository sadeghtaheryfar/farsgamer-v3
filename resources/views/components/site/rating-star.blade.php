@props(['rating'])

@if($rating > 0)
    <div class="rating-stars">
        <i class="{{($rating >= 1) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'}}"></i>
        <i class="{{($rating >= 2) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'}}"></i>
        <i class="{{($rating >= 3) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'}}"></i>
        <i class="{{($rating >= 4) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'}}"></i>
        <i class="{{($rating >= 5) ? 'rating-stars__filled-star icon-star-filled' : 'rating-stars__empty-star icon-star-outline'}}"></i>
    </div>
@endif