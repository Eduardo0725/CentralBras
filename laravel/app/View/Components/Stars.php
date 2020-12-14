<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Stars extends Component
{
    public $star1;
    public $star2;
    public $star3;
    public $star4;
    public $star5;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($numberOfStars = 3.5)
    {
        $stars = [
            'outline' => '/images/icons/star-outline.svg',
            'half' => '/images/icons/star-half.svg',
            'star' => '/images/icons/star.svg',
        ];

        $this->star1 = $numberOfStars >= 1 ? $stars['star'] : ($numberOfStars < 1 - 0.5 ? $stars['outline'] : $stars['half']);
        $this->star2 = $numberOfStars >= 2 ? $stars['star'] : ($numberOfStars < 2 - 0.5 ? $stars['outline'] : $stars['half']);
        $this->star3 = $numberOfStars >= 3 ? $stars['star'] : ($numberOfStars < 3 - 0.5 ? $stars['outline'] : $stars['half']);
        $this->star4 = $numberOfStars >= 4 ? $stars['star'] : ($numberOfStars < 4 - 0.5 ? $stars['outline'] : $stars['half']);
        $this->star5 = $numberOfStars >= 5 ? $stars['star'] : ($numberOfStars < 5 - 0.5 ? $stars['outline'] : $stars['half']);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.stars');
    }
}
