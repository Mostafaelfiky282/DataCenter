package com.example.todo;

import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import java.util.ArrayList;
import java.util.Arrays;

public class MainActivity extends AppCompatActivity {

    private EditText taskInput;
    private Button addTaskButton;
    private Button deleteTaskButton;
    private ListView taskListView;

    private ArrayList<String> tasks;
    private ArrayAdapter<String> taskAdapter;

    private SharedPreferences sharedPreferences;
    private static final String PREFS_NAME = "TodoAppPrefs";
    private static final String TASK_LIST_KEY = "TaskList";

    private int selectedTaskPosition = -1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        sharedPreferences = getSharedPreferences(PREFS_NAME, MODE_PRIVATE);
        taskInput = findViewById(R.id.taskInput);
        addTaskButton = findViewById(R.id.addTaskButton);
        deleteTaskButton = findViewById(R.id.deleteTaskButton);
        taskListView = findViewById(R.id.taskListView);

        tasks = loadTasks();
        taskAdapter = new ArrayAdapter<>(this, android.R.layout.simple_list_item_1, tasks);
        taskListView.setAdapter(taskAdapter);

        addTaskButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String task = taskInput.getText().toString().trim();

                if (!task.isEmpty()) {
                    if (selectedTaskPosition >= 0) {

                        tasks.set(selectedTaskPosition, task);
                        Toast.makeText(MainActivity.this, "Task Updated", Toast.LENGTH_SHORT).show();
                    } else {
                        tasks.add(task);
                        Toast.makeText(MainActivity.this, "Task Added", Toast.LENGTH_SHORT).show();
                    }
                    saveTasks();
                    taskAdapter.notifyDataSetChanged();
                    taskInput.setText("");
                    selectedTaskPosition = -1;
                    deleteTaskButton.setEnabled(false);
                }
            }
        });

        taskListView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                String selectedTask = tasks.get(position);
                taskInput.setText(selectedTask);
                selectedTaskPosition = position;
                Toast.makeText(MainActivity.this, "Task Selected for Editing", Toast.LENGTH_SHORT).show();
                deleteTaskButton.setEnabled(true);
            }
        });

        deleteTaskButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (selectedTaskPosition >= 0) {
                    tasks.remove(selectedTaskPosition);
                    saveTasks();
                    taskAdapter.notifyDataSetChanged();
                    taskInput.setText("");
                    selectedTaskPosition = -1;
                    deleteTaskButton.setEnabled(false);
                    Toast.makeText(MainActivity.this, "Task Deleted", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }

    private ArrayList<String> loadTasks() {
        String tasksString = sharedPreferences.getString(TASK_LIST_KEY, "");
        ArrayList<String> taskList = new ArrayList<>();
        if (!tasksString.isEmpty()) {
            taskList.addAll(Arrays.asList(tasksString.split(",")));
        }
        return taskList;
    }

    private void saveTasks() {
        String tasksString = String.join(",", tasks);
        SharedPreferences.Editor editor = sharedPreferences.edit();
        editor.putString(TASK_LIST_KEY, tasksString);
        editor.apply();
    }
}