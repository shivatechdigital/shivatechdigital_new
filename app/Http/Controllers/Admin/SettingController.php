<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display settings form
     */
    public function index()
    {
        $settings = Setting::getSettings();
        return view('adminDashboard.pages.sitedetails', compact('settings'));
    }

    /**
     * Update settings
     */
    public function update(Request $request)
    {
        try {
            // Validation
            $validator = Validator::make($request->all(), [
                'site_name' => 'required|string|max:255',
                'site_tagline' => 'nullable|string|max:255',
                'site_email' => 'required|email|max:255',
                'site_phone' => 'nullable|string|max:20',
                'site_address' => 'nullable|string|max:500',
                'site_url' => 'nullable|url|max:255',
                'site_description' => 'nullable|string|max:1000',
                
                // Social Media
                'facebook_url' => 'nullable|url|max:255',
                'twitter_url' => 'nullable|url|max:255',
                'linkedin_url' => 'nullable|url|max:255',
                'instagram_url' => 'nullable|url|max:255',
                'youtube_url' => 'nullable|url|max:255',
                
                // Files
                'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
                'site_icon' => 'nullable|image|mimes:png,ico,jpg|max:512',
                'og_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                
                // Other
                'footer_text' => 'nullable|string|max:500',
                'timezone' => 'nullable|string',
                'site_status' => 'required|in:active,maintenance,offline',
                
                // SEO
                'meta_title' => 'nullable|string|max:255',
                'meta_keywords' => 'nullable|string|max:1000',
                'meta_description' => 'nullable|string|max:1000',
    
                // Google
                'google_analytics' => 'nullable|string',
                'google_verification' => 'nullable|string|max:500',
                
                // Additional
                'whatsapp_number' => 'nullable|string|max:30',
                'support_email' => 'nullable|email|max:255',
                'business_hours' => 'nullable|string|max:500',
                'google_map_embed' => 'nullable|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            
            $settings = Setting::getSettings();
            $data = $request->except(['site_logo', 'site_icon', 'og_image']);

            // Handle Site Logo Upload
            if ($request->hasFile('site_logo') && $request->file('site_logo')->isValid()) {
                $data['site_logo'] = $this->handleFileUpload(
                    $request->file('site_logo'),
                    'settings/logos',
                    $settings->site_logo
                );
            }

            // Handle Site Icon Upload
            if ($request->hasFile('site_icon') && $request->file('site_icon')->isValid()) {
                $data['site_icon'] = $this->handleFileUpload(
                    $request->file('site_icon'),
                    'settings/icons',
                    $settings->site_icon
                );
            }

            // Handle OG Image Upload
            if ($request->hasFile('og_image') && $request->file('og_image')->isValid()) {
                $data['og_image'] = $this->handleFileUpload(
                    $request->file('og_image'),
                    'settings/og-images',
                    $settings->og_image
                );
            }

            //Clear Cache
            Setting::clearCache(); 
            // Update settings
            $settings->update($data);

            return back()->with('success', 'Settings updated successfully!');
            
        } catch (\Exception $e) {
            \Log::error('Settings update failed: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Failed to update settings: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Handle file upload with Hostinger compatibility
     * 
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory
     * @param string|null $oldPath
     * @return string
     */
    private function handleFileUpload($file, $directory, $oldPath = null)
    {
        // Delete old file from both storage and public directories
        if ($oldPath) {
            // Delete from storage/app/public
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
            
            // Delete from public/storage (Hostinger)
            $publicPath = public_path('storage/' . $oldPath);
            if (file_exists($publicPath)) {
                unlink($publicPath);
            }
        }

        // Store new file
        $path = $file->store($directory, 'public');
        
        // Copy to public/storage for Hostinger (since storage:link doesn't work)
        $source = storage_path('app/public/' . $path);
        $destination = public_path('storage/' . $path);
        
        // Create directory if it doesn't exist
        $destinationDir = dirname($destination);
        if (!file_exists($destinationDir)) {
            mkdir($destinationDir, 0755, true);
        }
        
        // Copy file to public/storage
        copy($source, $destination);
        
        return $path;
    }

    /**
     * Reset settings to default
     */
    public function reset()
    {
        try {
            $settings = Setting::getSettings();
            
            // Delete uploaded files from both locations
            $this->deleteFile($settings->site_logo);
            $this->deleteFile($settings->site_icon);
            $this->deleteFile($settings->og_image);

            // Reset to defaults
            $settings->update([
                'site_name' => config('app.name', 'Laravel'),
                'site_tagline' => null,
                'site_logo' => null,
                'site_icon' => null,
                'site_email' => config('mail.from.address'),
                'site_phone' => null,
                'site_address' => null,
                'site_url' => null,
                'site_description' => null,
                'facebook_url' => null,
                'twitter_url' => null,
                'linkedin_url' => null,
                'instagram_url' => null,
                'youtube_url' => null,
                'og_image' => null,
                'footer_text' => null,
                'timezone' => 'UTC',
                'site_status' => 'active',
            ]);

            return redirect()->route('index')
                ->with('success', 'Settings reset to default values!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to reset settings. Please try again.');
        }
    }

    /**
     * Delete file from both storage and public directories
     * 
     * @param string|null $path
     * @return void
     */
    private function deleteFile($path)
    {
        if (!$path) {
            return;
        }

        // Delete from storage/app/public
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        
        // Delete from public/storage (Hostinger)
        $publicPath = public_path('storage/' . $path);
        if (file_exists($publicPath)) {
            unlink($publicPath);
        }
    }
}