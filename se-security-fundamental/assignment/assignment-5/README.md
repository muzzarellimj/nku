# Assignment Five: Git and GitHub

## Read the Git Visual Guide

As a student, we must master the ideas discussed in 
[A Visual Git Reference](https://marklodato.github.io/visual-git-guide/index-en.html) by 
[Mark Lodato](https://github.com/MarkLodato). These ideas can be put into practice with the 
[Visualizing Git](https://git-school.github.io/visualizing-git/) web application, as seen in class. I found the
[basic Git usage illustration](https://marklodato.github.io/visual-git-guide/basic-usage.svg) particularly helpful as a 
reference.

## Practice with the Examples in the Presentation

Git maintains five core principles:

- Git has three different stages in managing content: a working directory, where we make the program; a staging area, 
  also called an index, which we use before committing a snapshot to the third stage; and a repository. The index exists 
  as an in-between stage because adding directly to the repository is expensive, and we cannot truly remove anything 
  once it is uploaded. Files can be modified in the working directly and overwritten with `git checkout --<filename>`.

- Git does not store patches with copies of all files; it stores snapshots of only modified files.

- Git manages files using blobs and trees: rather than a file itself, a zipped version of the file content is stored, 
  and rather than a directory itself, a tree is created to maintain directory structure.

- Git uses hashes in dealing with everything - commits, checkouts, tags, and branches - to effectively detect if 
  something is modified.

- Git has a local history - the repository - in a `.git` directory. This is created when initialising a directory with 
  Git (`git init` or otherwise). Git commands can then be used within the working directory to read and manipulate data 
  within the `.git` directory.

Along with the resources linked above, Git can be mastered level-by-level - understand the forest (process) before 
attempting to understand each tree (command).

### add, commit, checkout

In this section, we master committing files to an index and then a repository.

- use `git add` to store files in an index.
- use `git commit` to store files in an index by creating a snapshot in the repository.
- use `git commit -a` to combine the functionality of the two above functions.
- use `git checkout` to copy from an index to the working directory.

### amend, reset

In this section, we master amending commits and resetting the index.

- use `git commit -amend` to create a new commit from the parent and discard the previous.
- use `git reset` to reset the entire index from the commit the HEAD is referencing.
- use `git reset --hard` to additionally overwrite the working directory.

### tag, log, branch

In this section, we master (as the heading suggests) tags, logs, and branches.

- use `git tag <tag-name>` to tag the current commit.
  - use the `-f` flag to forcefully override existing tags. 
  - use the `-d` flag to delete existing tags.
- use `git log` to retrieve the history information.

Branching is one of the most important Git features; we frequently branch to experiment without affecting the main 
branch. 

- use `git branch <branch-name>` to create a new branch.
  - use the `-d` flag to delete an existing branch.
  - use the `-m` flag to rename an existing branch.
- use `git branch` to list the existing branches.

### merge

Once a second branch has been created and committed to, this branch can be merged with the main branch by 
checking out the main branch and calling the `git merge` command.

### rebase, cherry-pick

The three-way merge is useful but complicates the repository history; in this case, `git rebase` can be used to make 
the repository history linear by calling `git checkout` on the branch to be moved and `git rebase main` to rebase the 
second branch into the main branch. As a result, all commits in the second branch are applied to the main branch. The 
`git cherry-pick` command picks up the changes made to a certain commit.

## Commit the Toy Project to a GitHub Repository

The GitHub repository created for this section of the assignment can be found 
[here](https://github.com/muzzarellimj/se-security-fundamental/tree/main/note/toy-project).