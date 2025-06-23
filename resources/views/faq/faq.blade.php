@extends('layout.app')

@section('title', 'FAQ')

@section('content')
<div class="container mt-5">
<h3 class="text-center fw-bold">Pertanyaan Umum</h3>
<div class="accordion mt-5" id="accordionExample">
  @foreach($faqs as $faq)
  <div class="accordion-item">
    <h2 class="accordion-header" id="heading{{ $faq->id }}">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
        {{ $faq->question }}
      </button>
    </h2>
    <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        {!! $faq->answer !!}
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>
@endsection

@section('footer')

@endsection

@push('script')
    <script>
        const accordionButtons = document.querySelectorAll('.accordion-button');

  accordionButtons.forEach(button => {
    button.addEventListener('click', () => {
      const targetSelector = button.getAttribute('data-bs-target');
      const target = document.querySelector(targetSelector);

      if (target.classList.contains('show')) {
        target.classList.remove('show');
        button.classList.add('collapsed');
        button.setAttribute('aria-expanded', 'false');
      } else {
        document.querySelectorAll('.accordion-collapse').forEach(panel => {
          panel.classList.remove('show');
        });
        document.querySelectorAll('.accordion-button').forEach(btn => {
          btn.classList.add('collapsed');
          btn.setAttribute('aria-expanded', 'false');
        });

        target.classList.add('show');
        button.classList.remove('collapsed');
        button.setAttribute('aria-expanded', 'true');
      }
    });
  });
    </script>
@endpush
