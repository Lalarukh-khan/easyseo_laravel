<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LanguageDropdown extends Component
{
    public $language;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($language = 'english')
    {
        $this->language = $language;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.language-dropdown', ['language' => $this->language]);
    }
}
