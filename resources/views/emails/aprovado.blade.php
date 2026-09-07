<div style="font-family: Arial, sans-serif; background-color: #0f172a; color: #ffffff; padding: 40px; text-align: center; border-radius: 8px;">
    <h1 style="color: #60a5fa;">Parabéns, {{ $candidato->nome }}!</h1>
    
    <p style="font-size: 16px; color: #cbd5e1;">Você foi <strong>APROVADO</strong> para a vaga de <strong>{{ $candidato->cargo->cargo }}</strong>.</p>
    
    <p style="font-size: 16px; color: #cbd5e1;">Apresente-se no Centro de Comando na data agendada para o início do seu treinamento oficial.</p>
    
    <hr style="border: 1px solid #334155; margin: 30px 0;">
    
    <p style="font-size: 12px; color: #94a3b8;">Este é um e-mail automático do sistema Missão Espacial.</p>
</div>