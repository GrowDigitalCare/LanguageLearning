<?php

namespace App\Http\Controllers\Backend\Course;

use App\Http\Controllers\Controller;
use App\Models\CourseQuizOption;
use App\Models\CourseQuizQuestion;
use App\Models\CourseTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseQuizController extends Controller
{
    public function list(CourseTest $test)
    {
        $questions = CourseQuizQuestion::all();
        return view('backend.pages.course.questions.index', compact('test', 'questions'));
    }

    public function create()
    {
        $tests = CourseTest::with('lectures')->get();
        return view('backend.pages.course.questions.create', compact('tests'));
    }





    public function store(Request $request)
    {
        try {
            $requestData = $request->all();

            foreach ($requestData['questions'] as $questionData) {
                try {
                    $question = new CourseQuizQuestion();
                    $question->test_id = $requestData['test_id'];
                    $question->marks = $questionData['marks'];

                    // Handle audio file upload for each question
                    if ($request->hasFile('questions.' . $questionData['id'] . '.audio')) {
                        $audioFile = $request->file('questions.' . $questionData['id'] . '.audio');

                        // Generate a unique filename for the audio file
                        $fileName = time() . '_' . $audioFile->getClientOriginalName();

                        // Move the uploaded file to the desired location
                        $audioFile->move('uploads/audio', $fileName);

                        // Save the filename to the question object
                        $question->audio = $fileName;
                    }

                    // Save the question object
                    $question->save();

                    // Save options for the question
                    $option = new CourseQuizOption();
                    $option->question_id = $question->id;
                    $option->optionA = $questionData['options']['A'];
                    $option->optionB = $questionData['options']['B'];
                    $option->optionC = $questionData['options']['C'];
                    $option->optionD = $questionData['options']['D'];
                    $option->correctOpt = strtoupper($questionData['correctOpt']);
                    $option->save();

                    Log::info("Processed question:", [
                        'marks' => $questionData['marks'],
                        'optionA' => $option->optionA,
                        'optionB' => $option->optionB,
                        'optionC' => $option->optionC,
                        'optionD' => $option->optionD,
                        'correctOpt' => $option->correctOpt,
                    ]);
                } catch (\Exception $e) {
                    Log::error("Error processing question:", [
                        'exception' => $e,
                        'message' => $e->getMessage(),
                        'trace' => $e->getTraceAsString(),
                    ]);
                    return back()->withInput()->with('error', 'An error occurred while processing your question. Please try again.');
                }
            }

            Log::info('Questions and Options added successfully.');

            return redirect()->route('coursequiz-list')->with('success', 'Questions and options added successfully.');
        } catch (\Exception $e) {
            Log::error('Error during data processing:', [
                'exception' => $e,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->withInput()->with('error', 'An error occurred while processing your request.');
        }
    }




    public function edit($id)
    {
        $question = CourseQuizOption::findOrFail($id);
        $tests = CourseTest::all();

        // dd( $question,  $tests,);

        return view('backend.pages.course.questions.edi', compact('question', 'tests'));
    }


    public function update(Request $request, $id)
    {
        try {
            // Validate the request data
            $request->validate([
                'test_id' => 'required|exists:competition_tests,id',
                'questions.*.question' => 'required|string|max:255',
                'questions.*.marks' => 'required|integer|min:1',
                'questions.*.options.A' => 'required|string|max:255',
                'questions.*.options.B' => 'required|string|max:255',
                'questions.*.options.C' => 'required|string|max:255',
                'questions.*.options.D' => 'required|string|max:255',
                'questions.*.correctOpt' => 'required|string', // Remove 'max:1'
            ]);

            $requestData = $request->all();

            // Find the question by ID
            $question = CompetitionQuestion::findOrFail($id);
            $question->test_id = $requestData['test_id'];
            $question->question = $requestData['questions'][1]['question']; // Assuming only one question for simplicity
            $question->marks = $requestData['questions'][1]['marks']; // Assuming only one question for simplicity
            $question->save();

            // Update options for the question
            $option = CompetitionOption::where('question_id', $question->id)->first();
            $option->optionA = $requestData['questions'][1]['optionA']; // Assuming only one question for simplicity
            $option->optionB = $requestData['questions'][1]['optionB']; // Assuming only one question for simplicity
            $option->optionC = $requestData['questions'][1]['optionC']; // Assuming only one question for simplicity
            $option->optionD = $requestData['questions'][1]['optionD']; // Assuming only one question for simplicity

            // Convert correctOpt to uppercase before storing
            $correctOpt = strtoupper($requestData['questions'][1]['correctOpt']); // Assuming only one question for simplicity
            $option->correct_opt = $correctOpt;

            $option->save();

            \Log::info('Question and Options updated successfully.');

            // Redirect with success message
            return redirect()->route('competitionquestion-list')->with('success', 'Question and options updated successfully.');
        } catch (\Exception $e) {
            // Log the exception for further investigation
            \Log::error('Error during data processing:', [
                'exception' => $e,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Handle the exception gracefully and redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }

    public function delete(Request $request,$id)
    {
        $del= $request->id;
        $question = CompetitionQuestion::find($del);

        $question->delete();
        $option = CompetitionOption::where('question_id',$id)->first();
        $option->delete();
        return redirect()->back()->with('warning', 'Deleted  Successfully');
    }



}
