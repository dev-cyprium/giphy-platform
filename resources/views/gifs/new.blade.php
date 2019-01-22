<multi-step-form class="step-form" @submit="handleLastStep">
    <template slot-scope="{ activeStep }" slot="navigation">
        <ul>
            <li :class="{ 'is-active': (activeStep == 0) }">
                <i class="fas fa-microphone-alt"></i>
                {{ __("forms.giphy.express") }}
            </li>
            <li :class="[{ 'is-active': (activeStep == 1) }, 'f-2']">

                <i class="far fa-lightbulb"></i>
                Giphonize yourself
            </li>
            <li :class="{ 'is-active': (activeStep == 2) }">

                <i class="fas fa-sticky-note"></i>
                Make a post
            </li>
        </ul>
    </template>

    <template slot-scope="{mutator, d}">
        <form-step class="form-input">
            <textarea :value="d" @input="ev => mutator(ev.target.value)" placeholder="{{ __('forms.giphy.placeholder') }}"></textarea>
        </form-step>
        <form-step>
            <giphy-panel @change="data => mutator(data)"></giphy-panel>
        </form-step>
        <form-step >
            <h1>PLACEHOLDER POST PREVIEW</h1>
        </form-step>
    </template>
</multi-step-form>