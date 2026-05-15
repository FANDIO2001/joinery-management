@extends('layouts.dashboard')

@section('title', 'Calendrier des Congés')
@section('subtitle', 'Vue calendrier des congés')

@section('content')
<div id="employees-leaves-calendar">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">
        
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px; padding-bottom:20px; border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; color:#1f2937; margin:0;">Calendrier des Congés</h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">Vue mensuelle des congés</p>
            </div>
            <div style="display:flex; gap:12px;">
                <a href="/employees/leaves" style="display:inline-flex; align-items:center; gap:8px; padding:12px 20px; background:white; border:2px solid #e5e7eb; border-radius:8px; color:#374151; font-size:14px; font-weight:500; text-decoration:none; cursor:pointer;">← Liste</a>
                <a href="/employees/leaves/create" style="display:inline-flex; align-items:center; gap:8px; padding:12px 20px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:14px; font-weight:500; text-decoration:none; cursor:pointer; box-shadow:0 4px 12px rgba(16,185,129,0.3);">➕ Nouvelle demande</a>
            </div>
        </div>

        <div style="display:grid; grid-template-columns:1fr 300px; gap:24px;">
            
            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
                    <button style="padding:8px 16px; background:#f3f4f6; border:none; border-radius:6px; color:#374151; font-size:14px; font-weight:500; cursor:pointer;">←</button>
                    <h2 style="font-size:20px; font-weight:600; color:#1f2937; margin:0;">Mai 2025</h2>
                    <button style="padding:8px 16px; background:#f3f4f6; border:none; border-radius:6px; color:#374151; font-size:14px; font-weight:500; cursor:pointer;">→</button>
                </div>

                <div style="display:grid; grid-template-columns:repeat(7, 1fr); gap:8px; margin-bottom:16px;">
                    <div style="text-align:center; padding:12px; font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase;">Lun</div>
                    <div style="text-align:center; padding:12px; font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase;">Mar</div>
                    <div style="text-align:center; padding:12px; font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase;">Mer</div>
                    <div style="text-align:center; padding:12px; font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase;">Jeu</div>
                    <div style="text-align:center; padding:12px; font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase;">Ven</div>
                    <div style="text-align:center; padding:12px; font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase;">Sam</div>
                    <div style="text-align:center; padding:12px; font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase;">Dim</div>
                </div>

                <div style="display:grid; grid-template-columns:repeat(7, 1fr); gap:8px;">
                    <div style="min-height:80px; padding:8px; background:#f9fafb; border-radius:8px; border:1px solid #e5e7eb; color:#9ca3af; font-size:14px;">28</div>
                    <div style="min-height:80px; padding:8px; background:#f9fafb; border-radius:8px; border:1px solid #e5e7eb; color:#9ca3af; font-size:14px;">29</div>
                    <div style="min-height:80px; padding:8px; background:#f9fafb; border-radius:8px; border:1px solid #e5e7eb; color:#9ca3af; font-size:14px;">30</div>
                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">1</div>
                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">2</div>
                    <div style="min-height:80px; padding:8px; background:#f9fafb; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">3</div>
                    <div style="min-height:80px; padding:8px; background:#f9fafb; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">4</div>

                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">5</div>
                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">6</div>
                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">7</div>
                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">8</div>
                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">9</div>
                    <div style="min-height:80px; padding:8px; background:#f9fafb; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">10</div>
                    <div style="min-height:80px; padding:8px; background:#f9fafb; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">11</div>

                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">12</div>
                    <div style="min-height:80px; padding:8px; background:#dbeafe; border-radius:8px; border:2px solid #3b82f6; font-size:14px; font-weight:500;">
                        <div style="font-weight:600; color:#1e40af;">13</div>
                        <div style="font-size:10px; color:#1e40af; margin-top:4px;">PM</div>
                    </div>
                    <div style="min-height:80px; padding:8px; background:#dbeafe; border-radius:8px; border:2px solid #3b82f6; font-size:14px; font-weight:500;">
                        <div style="font-weight:600; color:#1e40af;">14</div>
                        <div style="font-size:10px; color:#1e40af; margin-top:4px;">PM</div>
                    </div>
                    <div style="min-height:80px; padding:8px; background:#dbeafe; border-radius:8px; border:2px solid #3b82f6; font-size:14px; font-weight:500;">
                        <div style="font-weight:600; color:#1e40af;">15</div>
                        <div style="font-size:10px; color:#1e40af; margin-top:4px;">PM</div>
                    </div>
                    <div style="min-height:80px; padding:8px; background:#dbeafe; border-radius:8px; border:2px solid #3b82f6; font-size:14px; font-weight:500;">
                        <div style="font-weight:600; color:#1e40af;">16</div>
                        <div style="font-size:10px; color:#1e40af; margin-top:4px;">PM</div>
                    </div>
                    <div style="min-height:80px; padding:8px; background:#f9fafb; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">17</div>
                    <div style="min-height:80px; padding:8px; background:#f9fafb; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">18</div>

                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">19</div>
                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">20</div>
                    <div style="min-height:80px; padding:8px; background:#fce7f3; border-radius:8px; border:2px solid #ec4899; font-size:14px; font-weight:500;">
                        <div style="font-weight:600; color:#9d174d;">21</div>
                        <div style="font-size:10px; color:#9d174d; margin-top:4px;">JD</div>
                    </div>
                    <div style="min-height:80px; padding:8px; background:#fce7f3; border-radius:8px; border:2px solid #ec4899; font-size:14px; font-weight:500;">
                        <div style="font-weight:600; color:#9d174d;">22</div>
                        <div style="font-size:10px; color:#9d174d; margin-top:4px;">JD</div>
                    </div>
                    <div style="min-height:80px; padding:8px; background:#fce7f3; border-radius:8px; border:2px solid #ec4899; font-size:14px; font-weight:500;">
                        <div style="font-weight:600; color:#9d174d;">23</div>
                        <div style="font-size:10px; color:#9d174d; margin-top:4px;">JD</div>
                    </div>
                    <div style="min-height:80px; padding:8px; background:#f9fafb; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">24</div>
                    <div style="min-height:80px; padding:8px; background:#f9fafb; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">25</div>

                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">26</div>
                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">27</div>
                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">28</div>
                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">29</div>
                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">30</div>
                    <div style="min-height:80px; padding:8px; background:white; border-radius:8px; border:1px solid #e5e7eb; font-size:14px; font-weight:500;">31</div>
                    <div style="min-height:80px; padding:8px; background:#f9fafb; border-radius:8px; border:1px solid #e5e7eb; color:#9ca3af; font-size:14px;">1</div>
                </div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; height:fit-content;">
                <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 20px 0;">Légende</h3>
                
                <div style="margin-bottom:16px;">
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                        <div style="width:24px; height:24px; background:#dbeafe; border:2px solid #3b82f6; border-radius:4px;"></div>
                        <span style="font-size:14px; color:#374151;">Pierre Martin</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                        <div style="width:24px; height:24px; background:#dcfce7; border:2px solid #16a34a; border-radius:4px;"></div>
                        <span style="font-size:14px; color:#374151;">Marie Laurent</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                        <div style="width:24px; height:24px; background:#fce7f3; border:2px solid #ec4899; border-radius:4px;"></div>
                        <span style="font-size:14px; color:#374151;">Jean Dupont</span>
                    </div>
                </div>

                <div style="border-top:1px solid #e5e7eb; padding-top:20px;">
                    <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 16px 0;">Congés ce mois</h3>
                    
                    <div style="background:#f9fafb; border-radius:8px; padding:12px; margin-bottom:12px; border:1px solid #e5e7eb;">
                        <div style="display:flex; align-items:center; gap:8px; margin-bottom:8px;">
                            <div style="width:24px; height:24px; background:#dbeafe; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:600; color:#1e40af;">PM</div>
                            <span style="font-weight:600; color:#1f2937; font-size:14px;">Pierre Martin</span>
                        </div>
                        <div style="font-size:13px; color:#6b7280; margin-bottom:4px;">13-16 Mai 2025</div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fef3c7; color:#b45309; font-size:11px; font-weight:600; border-radius:20px;">En attente</span>
                    </div>

                    <div style="background:#f9fafb; border-radius:8px; padding:12px; margin-bottom:12px; border:1px solid #e5e7eb;">
                        <div style="display:flex; align-items:center; gap:8px; margin-bottom:8px;">
                            <div style="width:24px; height:24px; background:#fce7f3; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:600; color:#9d174d;">JD</div>
                            <span style="font-weight:600; color:#1f2937; font-size:14px;">Jean Dupont</span>
                        </div>
                        <div style="font-size:13px; color:#6b7280; margin-bottom:4px;">21-23 Mai 2025</div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dcfce7; color:#166534; font-size:11px; font-weight:600; border-radius:20px;">Approuvé</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
