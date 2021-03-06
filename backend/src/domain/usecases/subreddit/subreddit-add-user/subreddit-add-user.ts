import { SubredditUserData } from '../../../entities/subreddit-entities/subreddit/subreddit-user-data';
import { SubredditRepository } from '../../ports/subreddit-repository';
import { ISubredditAddUser } from './subreddit-add-user-interface';
import { SubredditAddUserResponse } from './subreddit-add-user-response';

export class SubredditAddUser implements ISubredditAddUser {
  constructor(private readonly subredditRepository: SubredditRepository) {}

  async execute(
    subredditUser: SubredditUserData,
  ): Promise<SubredditAddUserResponse> {
    await this.saveSubredditUser(subredditUser);

    return true;
  }

  private async saveSubredditUser(
    subredditUser: SubredditUserData,
  ): Promise<void> {
    await this.subredditRepository.addUser(subredditUser);
  }
}
