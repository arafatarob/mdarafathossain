<div class="portfolio-agent" id="portfolioAgent">
  <button class="agent-toggle" id="agentToggle" type="button" aria-label="Open portfolio assistant">
    <span class="agent-toggle__icon"><i class="fa-solid fa-robot"></i></span>
    <span class="agent-toggle__text">
      <strong>AI Assistant</strong>
      <small>Ask me anything</small>
    </span>
  </button>

  <div class="agent-panel" id="agentPanel" aria-live="polite">
    <div class="agent-panel__header">
      <div>
        <p class="agent-panel__eyebrow">Portfolio Companion</p>
        <h3>Arafat AI</h3>
      </div>
      <div class="agent-panel__actions">
        <button class="agent-icon-btn" id="agentMicBtn" type="button" title="Voice input" aria-label="Voice input">
          <i class="fa-solid fa-microphone"></i>
        </button>
        <button class="agent-icon-btn" id="agentVoiceBtn" type="button" title="Toggle voice replies" aria-label="Toggle voice replies">
          <i class="fa-solid fa-volume-high"></i>
        </button>
        <button class="agent-icon-btn" id="agentCloseBtn" type="button" title="Close assistant" aria-label="Close assistant">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
    </div>

    <div class="agent-panel__body">
      <div class="agent-chip-row">
        <button class="agent-chip" type="button" data-prompt="Tell me about Arafat">About</button>
        <button class="agent-chip" type="button" data-prompt="What services do you offer?">Services</button>
        <button class="agent-chip" type="button" data-prompt="Show me your skills">Skills</button>
        <button class="agent-chip" type="button" data-prompt="Show me your projects">Projects</button>
      </div>

      <div class="agent-messages" id="agentMessages">
        <div class="agent-bubble agent-bubble--bot">
          Hello! I’m Arafat AI, your portfolio assistant. I can guide you through Arafat’s background, services, skills, projects, and contact details.
        </div>
      </div>

      <form class="agent-form" id="agentForm">
        <input type="text" id="agentInput" placeholder="Ask about his work, skills, or projects..." autocomplete="off" />
        <button type="submit" aria-label="Send message"><i class="fa-solid fa-paper-plane"></i></button>
      </form>
    </div>
  </div>
</div>

<style>
  .portfolio-agent {
    position: fixed;
    right: 22px;
    bottom: 22px;
    z-index: 9999;
    font-family: 'Inter', sans-serif;
  }

  .agent-toggle {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 16px;
    border: 0;
    border-radius: 999px;
    background: linear-gradient(135deg, rgba(0,229,200,0.95), rgba(139,92,246,0.95));
    color: #07111f;
    box-shadow: 0 16px 40px rgba(0, 0, 0, 0.28);
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .agent-toggle:hover {
    transform: translateY(-2px);
    box-shadow: 0 18px 44px rgba(0, 0, 0, 0.34);
  }

  .agent-toggle__icon {
    display: grid;
    place-items: center;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(255,255,255,0.25);
    font-size: 16px;
  }

  .agent-toggle__text {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    line-height: 1.15;
  }

  .agent-toggle__text strong {
    font-size: 14px;
    font-weight: 700;
  }

  .agent-toggle__text small {
    font-size: 11px;
    opacity: 0.85;
  }

  .agent-panel {
    position: absolute;
    right: 0;
    bottom: calc(100% + 14px);
    width: min(370px, calc(100vw - 28px));
    background: rgba(11, 15, 28, 0.94);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 24px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.45);
    backdrop-filter: blur(22px);
    -webkit-backdrop-filter: blur(22px);
    overflow: hidden;
    display: none;
  }

  .portfolio-agent.open .agent-panel {
    display: block;
    animation: agentFade 0.22s ease;
  }

  .agent-panel__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 14px 16px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    background: linear-gradient(135deg, rgba(0,229,200,0.12), rgba(139,92,246,0.12));
  }

  .agent-panel__eyebrow {
    margin: 0 0 2px;
    font-size: 10px;
    color: #5eead4;
    text-transform: uppercase;
    letter-spacing: 0.16em;
  }

  .agent-panel__header h3 {
    margin: 0;
    font-size: 16px;
    color: #f4f7ff;
  }

  .agent-panel__actions {
    display: flex;
    gap: 6px;
  }

  .agent-icon-btn {
    width: 34px;
    height: 34px;
    border: 0;
    border-radius: 50%;
    background: rgba(255,255,255,0.08);
    color: #f4f7ff;
    cursor: pointer;
  }

  .agent-icon-btn.active {
    background: rgba(0,229,200,0.22);
    color: #5eead4;
  }

  .agent-panel__body {
    padding: 14px;
  }

  .agent-chip-row {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 12px;
  }

  .agent-chip {
    border: 1px solid rgba(255,255,255,0.12);
    background: rgba(255,255,255,0.05);
    color: #d5d9e8;
    border-radius: 999px;
    padding: 7px 10px;
    font-size: 12px;
    cursor: pointer;
  }

  .agent-messages {
    display: flex;
    flex-direction: column;
    gap: 10px;
    max-height: 300px;
    overflow-y: auto;
    padding-right: 4px;
    margin-bottom: 12px;
  }

  .agent-bubble {
    max-width: 88%;
    padding: 10px 12px;
    border-radius: 16px;
    font-size: 13px;
    line-height: 1.55;
  }

  .agent-bubble--bot {
    background: rgba(255,255,255,0.06);
    color: #ecf1ff;
    border-top-left-radius: 6px;
  }

  .agent-bubble--user {
    align-self: flex-end;
    background: linear-gradient(135deg, rgba(0,229,200,0.22), rgba(139,92,246,0.2));
    color: #f8fbff;
    border-top-right-radius: 6px;
  }

  .agent-form {
    display: flex;
    gap: 8px;
  }

  .agent-form input {
    flex: 1;
    border: 1px solid rgba(255,255,255,0.1);
    background: rgba(255,255,255,0.06);
    color: #f4f7ff;
    padding: 11px 12px;
    border-radius: 12px;
    outline: none;
  }

  .agent-form button {
    border: 0;
    width: 42px;
    border-radius: 12px;
    background: linear-gradient(135deg, #00e5c8, #8b5cf6);
    color: #07111f;
    cursor: pointer;
  }

  @keyframes agentFade {
    from { opacity: 0; transform: translateY(6px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @media (max-width: 576px) {
    .portfolio-agent {
      right: 14px;
      bottom: 14px;
    }

    .agent-toggle {
      padding: 10px 13px;
    }

    .agent-toggle__text small {
      display: none;
    }
  }
</style>

<script>
  (function () {
    const agentRoot = document.getElementById('portfolioAgent');
    const toggleBtn = document.getElementById('agentToggle');
    const closeBtn = document.getElementById('agentCloseBtn');
    const micBtn = document.getElementById('agentMicBtn');
    const voiceBtn = document.getElementById('agentVoiceBtn');
    const form = document.getElementById('agentForm');
    const input = document.getElementById('agentInput');
    const messages = document.getElementById('agentMessages');
    const chips = document.querySelectorAll('.agent-chip');

    let voiceEnabled = false;
    let recognition = null;
    let isListening = false;

    function openAgent() {
      agentRoot.classList.add('open');
    }

    function closeAgent() {
      agentRoot.classList.remove('open');
    }

    function appendMessage(text, type) {
      const bubble = document.createElement('div');
      bubble.className = `agent-bubble agent-bubble--${type}`;
      bubble.textContent = text;
      messages.appendChild(bubble);
      messages.scrollTop = messages.scrollHeight;
    }

    function getReply(text) {
      const query = text.toLowerCase();

      if (/(hello|hi|hey|good morning|good evening|how are you)/.test(query)) {
        return 'Hello! I’m here to introduce Arafat’s portfolio and answer your questions in a clear, professional way.';
      }

      if (/(about|who is|who he|introduce|profile|background)/.test(query)) {
        return 'Arafat Hossain is a Digital Marketer and Frontend Developer focused on building modern, high-performing websites with a strong UI/UX touch and clean business strategy.';
      }

      if (/(service|services|what do you do|offer|help|work)/.test(query)) {
        return 'He offers web design, frontend development, digital marketing strategy, portfolio creation, and business-focused website solutions that help brands look professional online.';
      }

      if (/(skill|skills|technology|tech|stack)/.test(query)) {
        return 'His core skills include HTML5, CSS3, JavaScript, PHP, MySQL, Laravel, React, Next.js, Bootstrap, Tailwind, UI/UX, and performance-focused web development.';
      }

      if (/(project|projects|portfolio|work done|case study|featured)/.test(query)) {
        return 'His featured projects include arafatPortfolio, Handi Mobilité, Alga, and a Custom POS system. These projects reflect a mix of modern frontend work and business software solutions.';
      }

      if (/(contact|email|phone|whatsapp|location|reach|social)/.test(query)) {
        return 'You can reach him at mdarafathossenarob@gmail.com, call +880 1746500026, or connect from Dinajpur, Bangladesh.';
      }

      if (/(thanks|thank you|bye|goodbye)/.test(query)) {
        return 'You are welcome! If you want, I can also summarize his services, projects, or skill set in one short message.';
      }

      if (/(number|count|how many)/.test(query)) {
        return 'The portfolio highlights several featured projects and a strong set of services centered on digital presence, frontend development, and marketing.';
      }

      return 'I can help you learn about Arafat’s background, services, skills, projects, and contact details. Try asking about his services, skills, or portfolio work.';
    }

    function speak(text) {
      if (!voiceEnabled || typeof window.speechSynthesis === 'undefined') {
        return;
      }
      window.speechSynthesis.cancel();
      const utterance = new SpeechSynthesisUtterance(text);
      utterance.lang = 'en-US';
      utterance.rate = 1;
      utterance.pitch = 1;
      window.speechSynthesis.speak(utterance);
    }

    function createRecognition() {
      const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
      if (!SpeechRecognition) {
        micBtn.disabled = true;
        micBtn.title = 'Voice input is not supported in this browser';
        appendMessage('Voice input is not supported in this browser.', 'bot');
        return null;
      }

      const instance = new SpeechRecognition();
      instance.lang = 'en-US';
      instance.continuous = false;
      instance.interimResults = false;
      instance.maxAlternatives = 1;

      instance.onstart = function () {
        isListening = true;
        micBtn.classList.add('active');
        micBtn.innerHTML = '<i class="fa-solid fa-stop"></i>';
        appendMessage('Listening... please speak now.', 'bot');
      };

      instance.onresult = function (event) {
        const transcript = event.results[0][0].transcript.trim();
        if (transcript) {
          input.value = transcript;
          form.dispatchEvent(new Event('submit', { bubbles: true, cancelable: true }));
        }
      };

      instance.onspeechend = function () {
        try {
          instance.stop();
        } catch (err) {
          // ignore if already stopped
        }
      };

      instance.onnomatch = function () {
        appendMessage('I could not hear that clearly. Please try again.', 'bot');
      };

      instance.onerror = function (event) {
        let message = 'Voice input could not be understood. Please try again.';
        if (event.error === 'not-allowed' || event.error === 'service-not-allowed') {
          message = 'Microphone access is blocked. Please allow microphone access in your browser.';
        } else if (event.error === 'no-speech') {
          message = 'No speech detected. Please speak clearly into your microphone.';
        } else if (event.error === 'audio-capture') {
          message = 'No microphone was found. Please connect a microphone and try again.';
        }
        appendMessage(message, 'bot');
        isListening = false;
        micBtn.classList.remove('active');
        micBtn.innerHTML = '<i class="fa-solid fa-microphone"></i>';
      };

      instance.onend = function () {
        isListening = false;
        micBtn.classList.remove('active');
        micBtn.innerHTML = '<i class="fa-solid fa-microphone"></i>';
      };

      return instance;
    }

    toggleBtn.addEventListener('click', function () {
      agentRoot.classList.add('open');
    });

    closeBtn.addEventListener('click', closeAgent);

    voiceBtn.addEventListener('click', function () {
      voiceEnabled = !voiceEnabled;
      this.classList.toggle('active', voiceEnabled);
      this.innerHTML = voiceEnabled ? '<i class="fa-solid fa-volume-high"></i>' : '<i class="fa-solid fa-volume-xmark"></i>';
      appendMessage(voiceEnabled ? 'Voice replies enabled.' : 'Voice replies disabled.', 'bot');
    });

    micBtn.addEventListener('click', function () {
      if (!agentRoot.classList.contains('open')) {
        openAgent();
      }

      recognition = createRecognition();
      if (!recognition) {
        return;
      }

      if (isListening) {
        try {
          recognition.stop();
        } catch (err) {
          // ignore stop error
        }
        return;
      }

      try {
        recognition.start();
      } catch (err) {
        appendMessage('Voice input could not start. Please try again.', 'bot');
      }
    });

    form.addEventListener('submit', function (event) {
      event.preventDefault();
      const value = input.value.trim();
      if (!value) return;

      appendMessage(value, 'user');
      input.value = '';

      const reply = getReply(value);
      setTimeout(function () {
        appendMessage(reply, 'bot');
        speak(reply);
      }, 350);
    });

    chips.forEach(function (chip) {
      chip.addEventListener('click', function () {
        input.value = chip.dataset.prompt;
        input.focus();
        form.dispatchEvent(new Event('submit'));
      });
    });

    recognition = createRecognition();
  })();
</script>
