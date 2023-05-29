<option value="english" data-content='<span class="flag-icon flag-icon-us"></span> English' {{ $language=='english'
    ? 'selected' : null}}> English
</option>
<option value="dutch" data-content='<span class="flag-icon flag-icon-nl"></span> Dutch' {{ $language=='dutch'
    ? 'selected' : null}}>
    Dutch
</option>
<option value="french" data-content='<span class="flag-icon flag-icon-fr"></span> French' {{ $language=='french'
    ? 'selected' : null}}>
    French
</option>
<option value="german" data-content='<span class="flag-icon flag-icon-de"></span> German' {{ $language=='german'
    ? 'selected' : null}}>
    German
</option>
<option value="polish" data-content='<span class="flag-icon flag-icon-pl"></span> Polish' {{ $language=='polish'
    ? 'selected' : null}}>
    Polish
</option>
<option value="spanish" data-content='<span class="flag-icon flag-icon-es"></span> Spanish' {{ $language=='spanish'
    ? 'selected' : null}}>
    Spanish
</option>
<option value="portuguese" data-content='<span class="flag-icon flag-icon-pt"></span> Portuguese' {{ isset($edit) &&
    $edit->language=='portuguese' ? 'selected' : null}}>
    Portuguese
</option>
<option value="portuguese
        (brazilian)" data-content='<span class="flag-icon flag-icon-br"></span> Portuguese (Brazilian)' {{isset($edit)
    && $edit->language == 'portuguese (brazilian)' ? 'selected' : null}}>
    Portuguese (Brazilian)
</option>
<option value="russian" data-content='<span class="flag-icon flag-icon-ru"></span> Russian' {{ $language=='russian'
    ? 'selected' : null}}>
    Russian
</option>
<option value="japanese" data-content='<span class="flag-icon flag-icon-jp"></span> Japanese' {{ $language=='japanese'
    ? 'selected' : null}}>
    Japanese
</option>
<option value="chinese" data-content='<span class="flag-icon flag-icon-cn"></span> Chinese' {{ $language=='chinese'
    ? 'selected' : null}}>
    Chinese
</option>
<option value="bulgarian" data-content='<span class="flag-icon flag-icon-bg"></span> Bulgarian' {{ isset($edit) &&
    $edit->language=='bulgarian' ? 'selected' : null}}>
    Bulgarian
</option>
<option value="czech" data-content='<span class="flag-icon flag-icon-cz"></span> Czech' {{ $language=='czech'
    ? 'selected' : null}}>
    Czech
</option>
<option value="danish" data-content='<span class="flag-icon flag-icon-dk"></span> Danish' {{ $language=='danish'
    ? 'selected' : null}}>
    Danish
</option>
<option value="greek" data-content='<span class="flag-icon flag-icon-gr"></span> Greek' {{ $language=='greek'
    ? 'selected' : null}}>
    Greek
</option>
<option value="hungarian" data-content='<span class="flag-icon flag-icon-hu"></span> Hungarian' {{ isset($edit) &&
    $edit->language=='hungarian' ? 'selected' : null}}>
    Hungarian
</option>
<option value="lithuanian" data-content='<span class="flag-icon flag-icon-lt"></span> Lithuanian' {{ isset($edit) &&
    $edit->language=='lithuanian' ? 'selected' : null}}>
    Lithuanian
</option>
<option value="latvian" data-content='<span class="flag-icon flag-icon-lv"></span> Latvian' {{ $language=='latvian'
    ? 'selected' : null}}>
    Latvian
</option>
<option value="romanian" data-content='<span class="flag-icon flag-icon-ro"></span> Romanian' {{ $language=='romanian'
    ? 'selected' : null}}>
    Romanian
<option value="slovak" data-content='<span class="flag-icon flag-icon-sk"></span> Slovak' {{ $language=='slovak'
    ? 'selected' : null}}>
    Slovak
</option>
<option value="slovenian" data-content='<span class="flag-icon flag-icon-sl"></span> Slovenian' {{ isset($edit) &&
    $edit->language=='slovenian' ? 'selected' : null}}>
    Slovenian
</option>
<option value="swedish" data-content='<span class="flag-icon flag-icon-se"></span> Swedish' {{ $language=='swedish'
    ? 'selected' : null}}>
    Swedish
</option>
<option value="finnish" data-content='<span class="flag-icon flag-icon-fi"></span> Finnish' {{ $language=='finnish'
    ? 'selected' : null}}>
    Finnish
</option>
<option value="estonian" data-content='<span class="flag-icon flag-icon-et"></span> Estonian' {{ $language=='estonian'
    ? 'selected' : null}}>
    Estonian
</option>
